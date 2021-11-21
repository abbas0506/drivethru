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
            'pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {

            $paper = Paper::create($request->all());

            if ($request->hasFile('pic')) {
                $destination_path = 'public/images/papers';
                //save paper image into separate folder
                $file_name = $paper->id . '.' . $request->pic->extension();
                $request->file('pic')->storeAs($destination_path, $file_name);
                $paper->pic = $file_name;
            }

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
            'pic' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        try {
            //if picture updated
            if ($request->hasFile('pic')) {
                //unlink old image
                $destination_path = 'public/images/papers/';
                $file_path = $destination_path . $paper->pic;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }

                //save new pic after renaming
                $file_name = $paper->id . '.' . $request->pic->extension();
                $request->file('pic')->storeAs($destination_path, $file_name);
                $paper->pic = $file_name;
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

            unlink(storage_path('app/public/images/papers/' . $paper->pic));

            //$destination_path = 'public/images/papers/';
            // $file_path = $destination_path . $paper->pic;
            // if (file_exists($file_path)) {
            //     unlink(storage_path('app/folder/' . $file));
            //     unlink($file_path);
            // }
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