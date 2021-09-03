<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception;

use App\Models\Country;
use App\Models\Countryscholarship;
use App\Models\Countryvisadocs;
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
        //
        $request->validate([
            'name' => 'required',
            'visarequired' => 'required',
            'visaduration' => 'required',
            'livingcost' => 'required',
            'lifethere' => 'required',
        ]);

        $doc_ids = array();
        $scholarship_ids = array();




        DB::beginTransaction();

        try {

            $latest = Country::create($request->all());
            $latest->save();

            if ($request->doc_ids) {
                $doc_ids = explode(',', $request->doc_ids);
                foreach ($doc_ids as $doc_id) {
                    Countryvisadocs::create(['doc_id' => $doc_id, 'country_id' => $latest->id]);
                }
            }

            if ($request->scholarship_ids) {
                $scholarship_ids = explode(',', $request->scholarship_ids);
                foreach ($scholarship_ids as $scholarship_id) {
                    Countryscholarship::create(['scholarship_id' => $scholarship_id, 'country_id' => $latest->id]);
                }
            }


            DB::commit();
            // all good
            return redirect()->route('countries.index')
                ->with('success', 'Country created successfully.');
        } catch (Exception $e) {
            DB::rollback();

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
}