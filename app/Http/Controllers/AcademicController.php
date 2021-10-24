<?php

namespace App\Http\Controllers;

use App\Models\Academic;
use App\Models\Level;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Exception;

class AcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('user.academics.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $levels = Level::all();

        $current_year = Carbon::now()->format('Y');
        $years = collect();

        for ($year = $current_year; $year > $current_year - 50; $year--) {
            $years->add($year);
        }

        return view('user.academics.create', compact('levels', 'years'));
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
            'user_id' => 'required',
            'level_id' => 'required',
            'passyear' => 'required',
            'rollno' => 'required',
            'regno' => 'required',
            'major' => 'required',
            'biseuni' => 'required',
            'obtained' => 'required',
            'total' => 'required',


        ]);

        try {
            $academic = Academic::create($request->all());
            $academic->save();
            return redirect()->route('academics.index');
        } catch (Exception $ex) {
            return redirect()->back()
                ->withErrors($ex->getMessage()());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Academic  $academic
     * @return \Illuminate\Http\Response
     */
    public function show(Academic $academic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Academic  $academic
     * @return \Illuminate\Http\Response
     */
    public function edit(Academic $academic)
    {
        //
        $current_year = Carbon::now()->format('Y');
        $years = collect();

        for ($year = $current_year; $year > $current_year - 50; $year--) {
            $years->add($year);
        }

        return view('user.academics.edit', compact('academic', 'years'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Academic  $academic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Academic $academic)
    {
        //
        $request->validate([
            'passyear' => 'required',
            'rollno' => 'required',
            'regno' => 'required',
            'major' => 'required',
            'biseuni' => 'required',
            'obtained' => 'required',
            'total' => 'required',


        ]);

        try {
            $academic->update($request->all());
            return redirect()->route('profiles.index');
        } catch (Exception $ex) {
            return redirect()->back()
                ->withErrors($ex->getMessage()());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Academic  $academic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Academic $academic)
    {
        //
        try {
            $academic->delete();
            return redirect()->back()->with('success', 'Successfully deleted');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }
}