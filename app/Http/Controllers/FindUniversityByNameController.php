<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;
use Barryvdh\DomPDF\Facade as PDF;

class FindUniversityByNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('user.finduniversities.byname.index');
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
        //show specific university data
        $university = University::findOrFail($id);
        session([
            'university' => $university,
        ]);
        return view('user.finduniversities.byname.show', compact('university'));
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
    public function fetch(Request $request)
    {
        //fetch list of matching universities 
        $request->validate([
            'name' => 'required',
        ]);
        $universities = University::where('name', 'like', '%' . $request->name . '%')->get();

        return view('user.finduniversities.byname.searchlist', compact('universities'));
    }
    public function report($id)
    {
        //preview report
        $university = University::findOrFail($id);
        $pdf = PDF::loadView('user.finduniversities.byname.report', compact('university'));
        $pdf->output();
        return $pdf->setPaper('a4')->stream();
    }
    public function apply($id)
    {
        //return apply page
        $university = University::findOrFail($id);
        return view('user.finduniversities.byname.apply', compact('university'));
    }
}
