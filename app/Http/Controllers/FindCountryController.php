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
            $countries = Country::where('name', 'like', '%' . $country . '%')->get();
            return view('user.findcountry.search_result', compact('countries'));
        } else {
            // auto search request
            $request->validate([
                'course_id' => 'required',
            ]);

            $course_id = $request->course_id;
            try {

                $livingcosts = Livingcost::selectRaw('country_id, (min(minexp)+max(maxexp))/2 as livingcost')->groupBy('country_id');
                $studycosts = Studycost::selectRaw('country_id, (min(minfee)+max(maxfee))/2 as studycost')->groupBy('country_id');

                //get universities for selected courses
                $data = Country::join('favcourses', 'country_id', 'countries.id');

                //filter data on the basis of study cost range
                if (isset($request->minstudycost) && isset($request->maxstudycost)) {
                    $data = $data->joinSub($studycosts, 'studycosts', function ($join) {
                        $join->on('countries.id', 'studycosts.country_id');
                    })->whereBetween('livingcosts.livingcost', [$request->minstudycost, $request->maxstudycost]);;
                } else if (isset($request->minstudycost)) {
                    $data = $data->joinSub($studycosts, 'studycosts', function ($join) {
                        $join->on('countries.id', 'studycosts.country_id');
                    })->where('livingcosts.livingcost', ">=", $request->minstudycost);;
                } else if (isset($request->maxstudycost)) {
                    $data = $data->joinSub($studycosts, 'studycosts', function ($join) {
                        $join->on('countries.id', 'studycosts.country_id');
                    })->where('livingcosts.livingcost', "<=", $request->maxstudycost);;
                }

                //filter data on the basis of living cost range
                if (isset($request->minlivingcost) && isset($request->maxlivingcost)) {
                    $data = $data->joinSub($livingcosts, 'livingcosts', function ($join) {
                        $join->on('countries.id', 'livingcosts.country_id');
                    })->whereBetween('livingcosts.livingcost', [$request->minlivingcost, $request->maxlivingcost]);
                } else if (isset($request->minlivingcost)) {
                    $data = $data->joinSub($livingcosts, 'livingcosts', function ($join) {
                        $join->on('countries.id', 'livingcosts.country_id');
                    })->where('livingcosts.livingcost', ">=", $request->minlivingcost);
                } else if (isset($request->maxlivingcost)) {
                    $data = $data->joinSub($livingcosts, 'livingcosts', function ($join) {
                        $join->on('countries.id', 'livingcosts.country_id');
                    })->where('livingcosts.livingcost', "<=", $request->maxlivingcost);
                }

                //filter on visa required
                if (isset($request->visafree)) $data = $data->where('visafree', 1);
                if (isset($request->edufree)) $data = $data->where('edufree', 1);

                //finally pluck country ids fulfilling all parameters
                $country_ids = $data->where('course_id', $course_id)->distinct()->pluck("country_id")->toArray();

                $countries = Country::whereIn('id', $country_ids)->get();

                //send courses list as well for grouping purpose
                //$courses = Course::whereIn('id', $course_ids)->get();
                session([
                    'data' => $countries,
                    // 'countries' => $courses,
                ]);
                return view('user.findcountry.search_result', compact('countries'));
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