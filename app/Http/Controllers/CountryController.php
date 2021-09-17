<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception;

use App\Models\Country;
use App\Models\Countryscholarship;
use App\Models\Countryvisadoc;
use App\Models\Document;
use App\Models\Scholarship;
use App\Models\City;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //exclude pakistan from show list
        $countries = Country::where('id', '>', 1)->get()->sortByDesc('id');
        return view('admin.countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required',
            'flag' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'currency' => 'required',
            'visarequired' => 'required',
            'lifethere' => 'required',
            'jobdesc' => 'required',
        ]);

        try {

            $country = Country::create($request->all());
            //save flag image into separate folder
            $imageName = $country->id . '.' . $request->flag->extension();
            $request->flag->move(public_path('images/flags'), $imageName);
            $country->flag = $imageName;
            $country->step1 = 1;
            if (!$request->visarequired)
                $country->step2 = 1; //if visa not requird, auto complete 2nd step
            $country->save();
            return redirect()->back()->with('success', 'Successfully created');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
        //return view('admin.countries.show', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //renew country selection 
        session(['country' => $country]);
        return view('admin.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        //
        $request->validate([
            'name' => 'required',
            'flag' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'currency' => 'required',
            'visarequired' => 'required',
            'lifethere' => 'required',
            'jobdesc' => 'required',
            'intro' => 'required',
        ]);

        $path = public_path() . "/images/flags/";
        DB::beginTransaction();
        try {
            //if flag updated
            if (isset($request->flag)) {
                //unlink old image
                $oldfile = $path . $country->flag;
                if (file_exists($oldfile)) {
                    unlink($oldfile);
                }

                //save new pic after renaming
                $file = $request->file('flag');
                $filename = $country->id . '.' . $request->flag->extension();
                $file->move($path, $filename);

                $country->flag = $filename;
            }

            //initially assign incoming visa duration as it is, may update on next line if required
            $country->visaduration = $request->visaduration;
            //if visa requirement changes from yes to no
            if ($country->visarequired && !$request->visarequired) {
                $country->step2 = 1;            //auto complete step 2

                foreach ($country->countryvisadocs()->get() as $countryvisadoc) {
                    $countryvisadoc->delete();  //remove visa doc entries if any
                }
                $country->visaduration = 0;     //reset visa duration
            }
            //else if visa requiremtn changes from no to yes
            else if (!$country->visarequired && $request->visarequired) {
                $country->step2 = 0;            //revert step 2

            } //else if no change, do nothing

            //set remainging fields
            $country->name = $request->name;
            $country->currency = $request->currency;
            $country->visarequired = $request->visarequired;
            $country->lifethere = $request->lifethere;
            $country->jobdesc = $request->jobdesc;
            $country->intro = $request->intro;

            $country->save();   //update the record
            DB::commit();
            return redirect()->back()
                ->with('success', 'Basic info updated successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
        $country->delete();

        return redirect()
            ->back()
            ->with('success', 'Country removed successfully');
    }


    function country_visadocs()
    {
        $country = session('country');
        $docs = Document::all();
        return view("admin.countries.visadocs", compact('country', 'docs'));
    }
    function post_country_visadocs(Request $request)
    {
        $country = session('country');
        DB::beginTransaction();
        try {
            if ($request->doc_ids) {
                $doc_ids = explode(',', $request->doc_ids);
                foreach ($doc_ids as $doc_id) {
                    Countryvisadoc::create(['doc_id' => $doc_id, 'country_id' => $country->id]);
                }
                $country->step2 = 1;
                $country->update();
            }
            DB::commit();
            //all good
            return redirect()->route('country_visadocs');
        } catch (Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
        }
    }

    function delete_country_visadoc($doc_id)
    {
        $country = session('country');
        $countryvisadoc = $country->countryvisadocs()->where('doc_id', $doc_id)->first();
        $countryvisadoc->delete();
        return redirect()->back();
    }

    //scholarshis
    function country_scholarships()
    {
        $country = session('country');
        // $scholarships = Scholarship::all();
        return view("admin.countries.scholarships", compact('country'));
    }

    function post_country_scholarship(Request $request)
    {
        $country = session('country');
        DB::beginTransaction();
        try {
            if ($request->scholarship_ids) {
                $scholarship_ids = explode(',', $request->scholarship_ids);
                foreach ($scholarship_ids as $scholarship_id) {
                    Countryscholarship::create(['scholarship_id' => $scholarship_id, 'country_id' => $country->id]);
                }
                $country->step4 = 1;
                $country->update();
            }
            DB::commit();
            //all good
            return redirect()->back()->with('success', 'Scuccesful');
        } catch (Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
        }
    }

    function delete_country_scholarship($scholarship_id)
    {
        $country = session('country');
        $country_scholarship = $country->countryscholarships()->where('scholarship_id', $scholarship_id)->first();
        $country_scholarship->delete();
        return redirect()->back();
    }

    function country_jobs()
    {
        $country = session('country');
        return view("admin.countries.jobs", compact('country'));
    }
    function post_country_jobs(Request $request)
    {

        try {
            $country = session('country');
            $country->jobdesc = $request->jobdesc;
            $country->step4 = 1;
            $country->save();
            //all good
            return redirect()->back()->with('success', 'Basic info updated successfully.');
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}