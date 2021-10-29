<?php

namespace App\Http\Controllers;

use App\Models\ScholarshipOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class ScholarshipOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $country = session('country');
        return view('admin.countries.scholarships.index', compact('country'));
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
        //
        $country = session('country');
        $request->validate([
            'scholarship_ids' => 'required',
        ]);
        DB::beginTransaction();
        try {
            if ($request->scholarship_ids) {
                $scholarship_ids = explode(',', $request->scholarship_ids);
                foreach ($scholarship_ids as $scholarship_id) {
                    ScholarshipOffer::create(['country_id' => $country->id, 'scholarship_id' => $scholarship_id]);
                }
            }
            DB::commit();
            //all good
            return redirect()->back()->with('success', 'Scuccesful');
        } catch (Exception $ex) {
            return redirect()->back()->withErrors('error', $ex->getMessage());
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScholarshipOffer  $scholarshipOffer
     * @return \Illuminate\Http\Response
     */
    public function show(ScholarshipOffer $scholarshipOffer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScholarshipOffer  $scholarshipOffer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $country = session('country');
        return view('admin.countries.scholarships.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScholarshipOffer  $scholarshipOffer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScholarshipOffer $scholarshipOffer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScholarshipOffer  $scholarshipOffer
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScholarshipOffer $scholarshipOffer)
    {
        //
        $scholarshipOffer->delete();
        return redirect()->back()->with('success', 'Successfully removed');
    }
}