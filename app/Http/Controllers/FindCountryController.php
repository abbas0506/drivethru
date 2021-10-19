<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Course;
use App\Models\Favcourse;
use App\Models\Livingcost;
use App\Models\Studycost;
use Illuminate\Http\Request;
use Exception;

class FindCountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $favcourse_ids = Favcourse::distinct()->get('course_id');
        $courses = Course::whereIn('id', $favcourse_ids)->get();
        return view('user.findcountry.index', compact('courses'));
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
        if (isset($request->manual)) {
            //manual search request
            $country = $request->country;
            $countries = Country::where('name', 'like', $country . '%')->get();
            return view('user.findcountry.manual_search_result', compact('countries', 'country'));
        } else {
            // auto search request
            $request->validate([
                'course_id' => 'required',
            ]);

            $course_id = $request->course_id;
            try {

                $livingcosts = Livingcost::selectRaw('country_id, avg((minexp+maxexp)/2) as livingcost')->groupBy('country_id');
                $studycosts = Studycost::selectRaw('country_id, avg((minfee+maxfee)/2) as studycost')->groupBy('country_id');
                //get universities for selected courses
                $data = Country::join('favcourses', 'country_id', 'countries.id')
                    ->joinSub($livingcosts, 'livingcosts', function ($join) {
                        $join->on('countries.id', 'livingcosts.country_id');
                    })
                    ->joinSub($studycosts, 'studycosts', function ($join) {
                        $join->on('countries.id', 'studycosts.country_id');
                    })
                    // ->join('cities', 'cities.id', 'city_id')
                    // ->join('courses', 'courses.id', 'course_id')
                    ->where('course_id', $course_id)
                    ->get('*');
                //apply optional filters
                //if (isset($request->visarequired)) $data = $data->where('visarequired', $request->visarequired);

                // if (isset($request->visarequired)) echo "visa required";
                // if (isset($request->type)) $data = $data->where('type', $request->type);
                // if (isset($request->minfee)) $data = $data->where('fee', ">=", $request->minfee);
                // if (isset($request->maxfee)) $data = $data->where('fee', "<=", $request->maxfee);

                //extract required columns only
                //$data = $data->get(['countries.id as country_id', 'countries.name as country, livingcosts.cost']);

                foreach ($data as $row) {
                    echo "country" . $row->country_id . "livingcost" . $row->livingcost .  "studycost" . $row->studycost . "<br>";
                }

                //send courses list as well for grouping purpose
                //$courses = Course::whereIn('id', $course_ids)->get();
                session([
                    'data' => $data,
                    // 'countries' => $courses,
                ]);
                //return view('user.findcountry.auto_search_result', compact('data'));
            } catch (Exception $e) {
                return redirect()->back()->withErrors($e->getMessage());
                // something went wrong
            }
        }
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
}