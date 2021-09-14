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
        $papertypes = PaperType::all();
        return view('admin.papers.index', compact('data', 'papertypes'));
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
            'year' => 'required',
            'papertype_id' => 'required',
            'pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = public_path() . "/images/papers/";


        try {

            $new = Paper::create($request->all());

            $filename = $new->id . '.' . $request->pic->extension();
            $file = $request->file('pic');
            $file->move($path, $filename);

            $new->pic = $filename;
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
        return view('admin.papers.edit', compact('paper', 'papertypes'));
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
            'pic' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = public_path() . "/images/papers/";

        try {
            //if picture updated
            if (isset($request->pic)) {
                //unlink old image
                $oldfile = $path . $paper->pic;
                if (file_exists($oldfile)) {
                    unlink($oldfile);
                }

                //save new pic after renaming
                $file = $request->file('pic');
                $filename = $paper->id . '.' . $request->pic->extension();
                $file->move($path, $filename);

                $paper->pic = $filename;
            }
            //update field values
            $paper->papertype_id = $request->papertype_id;
            $paper->year = $request->year;

            $paper->update();

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
}