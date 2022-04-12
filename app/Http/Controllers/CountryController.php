<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception;

use App\Models\Country;

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
        $countries = Country::all()->sortByDesc('id');
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
        $countries = Country::orderBy('id', 'desc')->get();
        return view('admin.countries.create', compact('countries'));
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
            'intro' => 'required',
            'edufree' => 'required',
            'essential' => 'required',
            'lifethere' => 'required',
            'jobdesc' => 'required',
        ]);
        try {

            $country = Country::create($request->all());
            if ($request->hasFile('flag')) {
                //dont remove default.png
                if (!$country->flag == 'default.png') {
                    $file_path = public_path('images/countries/') . $country->flag;
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }
                //construct image name
                $file_name = $country->id . '.' . $request->flag->extension();
                $request->file('flag')->move(public_path('images/countries/'), $file_name);
                $country->flag = $file_name;
            }

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
        session(['country' => $country]);
        return view('admin.countries.show', compact('country'));
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
            'intro' => 'required',
            'edufree' => 'required',
            'essential' => 'required',
            'lifethere' => 'required',
            'jobdesc' => 'required',
        ]);

        DB::beginTransaction();
        try {
            //if flag updated
            if ($request->hasFile('flag')) {
                //dont remove default.png
                if (!$country->flag == 'default.png') {
                    $file_path = public_path('images/countries/') . $country->flag;
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }

                //save logo
                $file_name = $country->id . '.' . $request->flag->extension();
                $request->file('flag')->move(public_path('images/countries/'), $file_name);
                $country->flag = $file_name;
            }

            //set remainging fields
            $country->name = $request->name;
            $country->intro = $request->intro;
            $country->essential = $request->essential;
            $country->edufree = $request->edufree;
            $country->lifethere = $request->lifethere;
            $country->jobdesc = $request->jobdesc;
            $country->livingcostdesc = $request->livingcostdesc;

            $country->save();   //update the record
            DB::commit();
            return redirect()->route('countries.show', $country)->with('success', 'Basic info updated successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
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
        try {
            if (!$country->flag == 'default.png') {
                $file_path = public_path('images/countries/') . $country->flag;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            $country->delete();
            return redirect()->back()->with('success', 'Country removed successfully');
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }
}