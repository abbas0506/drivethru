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

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $countries = Country::all();
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
        $docs = Document::all();
        $scholarships = Scholarship::all();
        return view('admin.countries.create', compact('docs', 'scholarships'));
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
            'visarequired' => 'required',
            'visaduration' => 'required',
            'livingcost' => 'required',
            'lifethere' => 'required',
        ]);

        try {

            $country = Country::create($request->all());
            //save flag image into separate folder
            $imageName = $country->id . '.' . $request->flag->extension();
            $request->flag->move(public_path('images/flags'), $imageName);
            $country->flag = $imageName;
            $country->finishedstep = 1;
            $country->save();

            session(['country' => $country]);

            return redirect()->route('country_visadocs')
                ->with('success', 'Country created successfully.');
        } catch (Exception $e) {
            return redirect()->route('countries.index')
                ->withErrors($e->getMessage());
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
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
                $country->finishedstep = 2;
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
                $country->finishedstep = 3;
                $country->update();
            }
            DB::commit();
            //all good
            return redirect()->route('country_scholarships');
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
}