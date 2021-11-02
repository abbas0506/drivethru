<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\University;
use App\Models\Faculty;
use App\Models\Course;
use Illuminate\Http\Request;
use Exception;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $universities = University::orderBy('id', 'desc')->get();
        return view('admin.universities.index', compact('universities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $universities = University::all();
        $cities = City::all()->sortBy('name');
        return view('admin.universities.create', compact('universities', 'cities'));
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
            'city_id' => 'required',
            'type' => 'required',
            'rank' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {

            $university = University::create($request->all());
            //save file on storage
            if ($request->hasFile('logo')) {
                if (!$university->logo == 'default.png') {
                    $file_path = public_path('images/universities/') . $university->logo;
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }
                $file_name = $university->id . '.' . $request->logo->extension();
                $request->file('logo')->move(public_path('images/universities/'), $file_name);
                $university->logo = $file_name;
            }

            $university->save();
            session(['university' => $university]);

            return redirect()->back()->with('success', 'Successfully created');;
        } catch (Exception $e) {
            return redirect()->route('universities.index')
                ->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function show(University $university)
    {
        //
        session(['university' => $university]);
        $cities = City::all()->sortBy('name');
        return view('admin.universities.show', compact('university', 'cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function edit(University $university)
    {
        //
        session(['university' => $university]);
        $universities = University::all();
        $cities = City::all()->sortBy('name');
        return view('admin.universities.edit', compact('university', 'cities', 'universities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, University $university)
    {
        //
        $request->validate([
            'name' => 'required',
            'city_id' => 'required',
            'type' => 'required',
            'rank' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {

            if ($request->hasFile('logo')) {
                //dont remove default.png
                if (!$university->logo == 'default.png') {
                    $file_path = public_path('images/universities/') . $university->logo;
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }

                //save logo
                $file_name = $university->id . '.' . $request->logo->extension();
                $request->file('logo')->move(public_path('images/universities/'), $file_name);
                $university->logo = $file_name;
            }
            //update field values
            $university->name = $request->name;
            $university->city_id = $request->city_id;
            $university->type = $request->type;
            $university->rank = $request->rank;
            $university->update();

            return redirect()->back()->with('success', 'Successfully updated');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function destroy(University $university)
    {
        //
        try {
            if (!$university->logo == 'default.png') {
                $file_path = public_path('images/universities/') . $university->logo;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            $university->delete();
            return redirect()->back()->with('success', 'University removed successfully');
        } catch (Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }



    public function uni_courses()
    {
        $university = session('university');
        $courses = Course::all();
        $faculties = Faculty::all();
        return view('admin.universities.courses', compact('university', 'faculties', 'courses'));
    }





    public function fetchLevelsAndCoursesByFacultyId(Request $request)
    {
        $course_ids = Course::where('faculty_id', $request->faculty_id)->distinct()->get('level_id');

        $level_options = "";
        foreach ($course_ids as $course) {
            $level_options .= "<option value='" . $course->level_id . "'>" . $course->level->name . "</option>";
        }

        $course_options = "";
        if ($course_ids->count() > 0) {
            $first_course_level_id = $course_ids->first()->level_id;
            $courses = Course::where('faculty_id', $request->faculty_id)
                ->where('level_id', $first_course_level_id) //select first level and load corresponding courses
                ->get();
            foreach ($courses as $course) {
                $course_options .= "<option value='" . $course->id . "'>" . $course->name . "</option>";
            }
        }
        //$msg = "faculty" . $request->faculty_id;
        return response()->json(['level_options' => $level_options, 'course_options' => $course_options]);
    }

    public function fetchCoursesByFacultyAndLevelId(Request $request)
    {
        //select course for given faculty and level ids
        $courses = Course::where('faculty_id', $request->faculty_id)
            ->where('level_id', $request->level_id)->get();

        //prepare courses list
        $course_options = "";
        foreach ($courses as $course) {
            $course_options .= "<option value='" . $course->id . "'>" . $course->name . "</option>";
        }

        return response()->json(['course_options' => $course_options]);
    }
}
