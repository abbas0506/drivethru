<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use App\Models\PaperType;
use Illuminate\Http\Request;
use Exception;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ////
        $data = Paper::all()->sortByDesc('id');
        return view('representative.papers.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $papertypes = PaperType::all();
        return view('representative.papers.create', compact('papertypes'));
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
            'year' => 'required',
            'papertype_id' => 'required',
            'url' => 'required',
        ]);

        try {

            $paper = Paper::create($request->all());
            $paper->save();
            return redirect()->back()->with('success', 'Successfully created');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function show(Paper $paper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function edit(Paper $paper)
    {
        //
        $papertypes = PaperType::all();
        return view('representative.papers.edit', compact('paper', 'papertypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paper $paper)
    {
        //
        $request->validate([
            'year' => 'required',
            'papertype_id' => 'required',
            'url' => 'required',
        ]);


        try {
            $paper->update($request->all());
            return redirect()->route('papers.index')->with('success', 'Successfully updated');
        } catch (Exception $e) {
            return redirect()->route('papers.index')->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paper $paper)
    {
        //
        try {
            $paper->delete();
            return redirect()->back()->with('success', 'Successfully deleted');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }

    public function download()
    {
        $papers = Paper::all();
        return view('user.papers.download', compact('papers'));
    }
}