<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Exception;

class CourseController extends Controller
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
        $request->validate([
            'name' => 'required',
            'faculty_id' => 'required',
        ]);

        try {

            $new = Course::create($request->all());
            $new->save();
            $faculty = Faculty::find($request->faculty_id);
            return redirect()->back()->with(
                [
                    'success' => 'Successfully created',
                    'faculty' => $faculty,
                ]
            );
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
        return view('admin.primary.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {

            $course->update($request->all());
            return redirect()->route('faculties.show', $course->faculty_id)->with('success', 'Successfully created');
        } catch (Exception $e) {
            return redirect()->route('courses.index')->withErrors($e->getMessage());
            // something went wrong
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
        try {
            $course->delete();
            return redirect()->back()->with('success', 'Successfully deleted');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }

    public function fetchCoursesByFacultyId(Request $request)
    {
        // select course for given faculty
        $courses = Course::where('faculty_id', $request->faculty_id)->get();

        //prepare courses list
        $course_options = "<option value=''>Select a course</option>";
        foreach ($courses as $course) {
            $course_options .= "<option value='" . $course->id . "'>" . $course->name . "</option>";
        }

        return response()->json(['course_options' => $course_options]);
    }
}