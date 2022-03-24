<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Exception;

class FindCountriesByNameController extends Controller
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
        return view('student.findcountries.byname.index', compact('countries'));
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


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $country = Country::find($id);
        return view('student.findcountries.byname.show', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // public function search(Request $request)
    // {
    //     $country = $request->country;
    //     $countries = Country::where('name', 'like', '%' . $country . '%')->get();
    //     return view('student.findcountries.byname.searchlist', compact('countries'));
    // }
    public function report($id)
    {
        $country = Country::find($id);
        $pdf = PDF::loadView("student.findcountries.byname.report", compact('country'));
        $pdf->output();
        return $pdf->setPaper('a4')->stream();
    }
    public function apply($id)
    {
        //return apply page
        $country = Country::find($id);
        return view('student.findcountries.byname.apply', compact('country'));
    }
}