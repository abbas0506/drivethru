<?php

namespace App\Http\Controllers;

use App\Models\Countryvisadoc;
use Illuminate\Http\Request;

class CountryvisadocsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Countryvisadocs  $countryvisadocs
     * @return \Illuminate\Http\Response
     */
    public function show(Countryvisadoc $countryvisadoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Countryvisadocs  $countryvisadocs
     * @return \Illuminate\Http\Response
     */
    public function edit(Countryvisadoc $countryvisadoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Countryvisadocs  $countryvisadocs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Countryvisadoc $countryvisadoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Countryvisadocs  $countryvisadocs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Countryvisadoc $countryvisadoc)
    {
        //
        $countryvisadoc->delete();
        return redirect()
            ->back()
            ->with('success', 'Document removed successfully');
        //echo $countryvisadoc . "to del";
    }
}