<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Course;
use App\Models\University;
use App\Models\City;
use Barryvdh\DomPDF\Facade as PDF;
use Exception;

use Illuminate\Http\Request;

class FindUniversityController extends Controller
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
        $faculty_ids = Course::distinct()->get('faculty_id');
        $faculties = Faculty::whereIn('id', $faculty_ids)->get();
        return view('national.finduniversity.index', compact('cities', 'faculties'));
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
            'ids' => 'required',
        ]);

        echo $request->ids;
        // return response()->json(['msg' => $request->ids]);
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
            'course_id1' => 'required',
            'mode' => 'required',
        ]);

        $course_ids = collect();
        if (isset($request->course_id1)) $course_ids->add($request->course_id1);
        if (isset($request->course_id2)) $course_ids->add($request->course_id2);
        if (isset($request->course_id3)) $course_ids->add($request->course_id3);

        try {
            //get universities for selected courses
            $data = University::join('unicourses', 'unicourses.university_id', 'universities.id')
                ->join('cities', 'cities.id', 'city_id')
                ->join('courses', 'courses.id', 'course_id')
                ->whereIn('course_id', $course_ids);
            //apply optional filters
            if (isset($request->city_id)) $data = $data->where('city_id', $request->city_id);
            if (isset($request->type)) $data = $data->where('type', $request->type);
            if (isset($request->minfee)) $data = $data->where('fee', ">=", $request->minfee);
            if (isset($request->maxfee)) $data = $data->where('fee', "<=", $request->maxfee);
            if ($request->mode == 'expert')
                $data = $data->orderBy('rank')->limit(2);
            //extract required columns only
            $data = $data->get(['universities.id as university_id', 'universities.name as university', 'type', 'fee', 'cities.name as city', 'courses.id as course_id', 'closing', 'lastmerit']);

            //send courses list as well for grouping purpose
            $courses = Course::whereIn('id', $course_ids)->get();
            session([
                'data' => $data,
                'courses' => $courses,
            ]);
            return view('national.finduniversity.edit', compact('data', 'courses'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }
    public function download()
    {
        $data = session('data');
        $courses = session('courses');
        $pdf = PDF::loadView("national.finduniversity.download", compact('courses', 'data'));
        $pdf->output();
        return $pdf->setPaper('a4')->stream();
    }
}