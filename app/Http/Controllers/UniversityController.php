<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
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
        $universities = University::all()->sortBy('name');
        $countries = Country::all()->sortBy('name');
        $cities = City::all()->sortBy('name');
        return view('admin.universities.index', compact('universities', 'countries', 'cities'));
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
            'city_id' => 'required',
            'country_id' => 'required',
            'type' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = public_path() . "/images/universities/";

        try {

            $university = University::create($request->all());
            //save flag image into separate folder
            $filename = $university->id . '.' . $request->logo->extension();
            $file = $request->file('logo');
            $file->move($path, $filename);

            $university->logo = $filename;
            $university->save();
            $university->step1 = 1;
            $university->save();

            session(['university' => $university]);

            return redirect()->route('universities.index')->with('success', 'Successfully created');;
        } catch (Exception $e) {
            return redirect()->route('countries.index')
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
        $countries = Country::all()->sortBy('name');
        $cities = City::all()->sortBy('name');
        return view('admin.universities.edit', compact('university', 'countries', 'cities'));
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
            'country_id' => 'required',
            'type' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = public_path() . "/images/universities/";

        try {
            //if picture updated
            if (isset($request->logo)) {
                //unlink old image
                $oldfile = $path . $university->logo;
                if (file_exists($oldfile)) {
                    unlink($oldfile);
                }

                //save new pic after renaming
                $file = $request->file('logo');
                $filename = $university->id . '.' . $request->logo->extension();
                $file->move($path, $filename);

                $university->logo = $filename;
            }
            //update field values
            $university->name = $request->name;
            $university->city_id = $request->city_id;
            $university->country_id = $request->country_id;
            $university->type = $request->type;
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
            $university->delete();
            return redirect()->back()->with('success', 'Successfully deleted');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
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
        $distict_course_levels = Course::where('faculty_id', $request->faculty_id)->distinct()->get('level_id');

        $level_options = "";
        foreach ($distict_course_levels as $course) {
            $level_options .= "<option value='" . $course->level_id . "'>" . $course->level->name . "</option>";
        }

        $course_options = "";
        if ($distict_course_levels->count() > 0) {
            $first_course_level_id = $distict_course_levels->first()->level_id;
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