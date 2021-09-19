<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Unicourse;
use Exception;
use Illuminate\Http\Request;

class UnicourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return faculty wise levels and their courses
        $university = session('university');
        $faculties = Faculty::all();
        return view('admin.universities.courses.index', compact('university', 'faculties'));

        // foreach ($university->faculties() as $faculty)
        //     echo $faculty->name;
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
            'university_id' => 'required',
            'course_id' => 'required',
            'duration' => 'required',
            'minfee' => 'required',
            'maxfee' => 'required',

        ]);

        try {

            $unicourse = Unicourse::create($request->all());
            $unicourse->save();
            //mark 2nd step as completed
            $university = session('university');
            $university->step2 = 1;
            $university->save();
            return redirect()->back()->with('success', 'Successfully created');;
        } catch (Exception $e) {
            return redirect()->route('unicourses.index')
                ->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unicourse  $unicourse
     * @return \Illuminate\Http\Response
     */
    public function show(Unicourse $unicourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unicourse  $unicourse
     * @return \Illuminate\Http\Response
     */
    public function edit(Unicourse $unicourse)
    {
        //
        $university = session('university');
        return view('admin.universities.courses.edit', compact('university', 'unicourse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unicourse  $unicourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unicourse $unicourse)
    {
        //
        $request->validate([
            'duration' => 'required',
            'minfee' => 'required',
            'maxfee' => 'required',

        ]);

        try {

            $unicourse = $unicourse->update($request->all());
            return redirect()->route('unicourses.index')->with('success', 'Successfully created');;
        } catch (Exception $e) {
            return redirect()->route('unicourses.index')
                ->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unicourse  $unicourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unicourse $unicourse)
    {
        //

        try {
            $unicourse->delete();
            return redirect()->back()->with('success', 'successfully removed');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}