<?php

namespace App\Http\Controllers;

use App\Models\PaperType;
use Illuminate\Http\Request;
use Exception;

class PaperTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $papertypes = PaperType::all();
        return view('admin.primary.papertypes.index', compact('papertypes'));
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
        $request->validate([
            'name' => 'required',
        ]);

        try {

            $new = PaperType::create($request->all());
            $new->save();
            return redirect()->back()->with('success', 'Successfully created');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaperType  $papertype
     * @return \Illuminate\Http\Response
     */
    public function show(PaperType $papertype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaperType  $papertype
     * @return \Illuminate\Http\Response
     */
    public function edit(papertype $papertype)
    {
        //
        return view('admin.primary.papertypes.edit', compact('papertype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\papertype  $papertype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, papertype $papertype)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);

        try {

            $papertype->update($request->all());
            return redirect()->route('papertypes.index')->with('success', 'Successfully created');
        } catch (Exception $e) {
            return redirect()->route('papertypes.index')->withErrors($e->getMessage());
            // something went wrong
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaperType  $papertype
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaperType $papertype)
    {
        //
        try {
            $papertype->delete();
            return redirect()->back()->with('success', 'Successfully deleted');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }
}