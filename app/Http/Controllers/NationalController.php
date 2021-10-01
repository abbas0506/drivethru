<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Course;
use App\Models\University;
use App\Models\City;
use App\Models\Unicourse;
use Exception;

class NationalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cities = City::all()->sortBy('name');
        $level_ids = Course::distinct()->get('level_id');
        $levels = Level::whereIn('id', $level_ids)->get();
        return view('students.national.index', compact('cities', 'levels'));
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
    public function fetchUniversitiesByCourseId(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
        ]);

        try {
            //selected course id
            $selected_course_id = $request->course_id;
            $university_ids = Unicourse::where('course_id', $selected_course_id)->pluck('university_id')->toArray();
            $universities = University::whereIn('id', $university_ids)->get();

            $cities = City::all()->sortBy('name');
            $level_ids = Course::distinct()->get('level_id');
            $levels = Level::whereIn('id', $level_ids)->get();

            //find selected course and its level
            $selected_course = Course::find($selected_course_id);
            //prepare courses list for selected level
            $courses = Course::where('level_id', $selected_course->level->id)->get();

            return view('students.national.edit', compact('cities', 'levels', 'universities', 'courses', 'selected_course'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }
}