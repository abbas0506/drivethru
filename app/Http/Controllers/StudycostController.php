<?php

namespace App\Http\Controllers;

use App\Models\Studycost;
use App\Models\Level;
use Illuminate\Http\Request;
use Exception;

class StudycostController extends Controller
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
        $levels = Level::where('id', '>', 2)->get();
        $level_ids = Studycost::where('country_id', $country->id)->distinct()->get('level_id')->toArray();
        $levels = Level::whereNotIn('id', $level_ids)
            ->where('id', '>', 2)->get();


        $studycosts = Studycost::all();
        return view('admin.countries.studycosts.index', compact('levels', 'country', 'studycosts'));
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
            'level_id' => 'required',
            'minfee' => 'required',
            'maxfee' => 'required',
        ]);

        try {
            $country = session('country');
            $studycost = Studycost::create([
                'level_id' => $request->level_id,
                'country_id' => $country->id,
                'minfee' => $request->minfee,
                'maxfee' => $request->maxfee,

            ]);
            $studycost->save();

            return redirect()->back()->with('success', 'Successfully created');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Studycost  $studycost
     * @return \Illuminate\Http\Response
     */
    public function show(Studycost $studycost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Studycost  $studycost
     * @return \Illuminate\Http\Response
     */
    public function edit(Studycost $studycost)
    {
        $country = session('country');
        return view('admin.countries.studycosts.edit', compact('studycost', 'country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Studycost  $studycost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Studycost $studycost)
    {
        //
        $request->validate([
            'minfee' => 'required',
            'maxfee' => 'required',
        ]);

        try {
            $studycost->update($request->all());
            return redirect()->route('studycosts.index')->with('success', 'Successfully created');
        } catch (Exception $e) {
            return redirect()->route('studycosts.index')->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Studycost  $studycost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Studycost $studycost)
    {
        //
        $studycost->delete();
        return redirect()
            ->back()
            ->with('success', 'Successfully removed');
    }
}