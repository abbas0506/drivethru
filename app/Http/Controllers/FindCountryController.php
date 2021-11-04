<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Course;
use App\Models\Favcourse;
use App\Models\Livingcost;
use App\Models\Studycost;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade as PDF;
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

            session([
                'findcountry_countries' => $countries,
                'findcountry_mode' => 'manual',
                // 'countries' => $courses,
            ]);

            return view('user.findcountry.search_result', compact('countries'));
        } else {
            // auto search request
            $request->validate([
                'course_id' => 'required',
            ]);

            $course_id = $request->course_id;
            $course = Course::find($course_id);
            try {

                //compute living costs of each country
                $livingcosts = Livingcost::selectRaw('country_id, (min(minexp)+max(maxexp))/2 as livingcost')
                    ->groupBy('country_id');

                if (isset($request->minlivingcost) && isset($request->maxlivingcost)) {
                    $livingcosts = $livingcosts->havingRaw("livingcost between " . $request->minlivingcost . " and " . $request->maxlivingcost);
                } else if (isset($request->minlivingcost)) {
                    $livingcosts = $livingcosts->havingRaw("livingcost > " . $request->minlivingcost);
                } else if (isset($request->maxlivingcost)) {
                    $livingcosts = $livingcosts->havingRaw("livingcost < " . $request->maxlivingcost);
                }

                //compute study costs of each country
                $studycosts = Studycost::selectRaw('country_id, (min(minfee)+max(maxfee))/2 as studycost')
                    ->groupBy('country_id');

                if (isset($request->minstudycost) && isset($request->maxstudycost)) {
                    $studycosts = $studycosts->havingRaw("studycost between " . $request->minstudycost . " and " . $request->maxstudycost);
                } else if (isset($request->minstudycost)) {
                    $studycosts = $studycosts->havingRaw("studycost > " . $request->minstudycost);
                } else if (isset($request->maxstudycost)) {
                    $studycosts = $studycosts->havingRaw("studycost < " . $request->maxstudycost);
                }

                $countries = Country::select('countries.id', 'countries.name', 'studycosts.studycost', 'livingcosts.livingcost')
                    ->joinSub($studycosts, 'studycosts', function ($join) {
                        $join->on('studycosts.country_id', '=', 'countries.id');
                    })->joinSub($livingcosts, 'livingcosts', function ($join) {
                        $join->on('livingcosts.country_id', '=', 'countries.id');
                    })
                    ->get();

                //apply filter if free education option is selected
                if (isset($request->edufree)) $countries = $countries->where('edufree', 1);

                session([
                    'findcountry_countries' => $countries,
                    'findcountry_course' => $course,
                    'countries' => $countries,
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
        $country = Country::find($id);
        return view('user.findcountry.show', compact('country'));
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
    public function autosearch()
    {
        $countries = session('findcountry_countries');
        $course = session('findcountry_course');
        $pdf = PDF::loadView("user.findcountry.reports.listofcountries", compact('course', 'countries'));
        $pdf->output();
        return $pdf->setPaper('a4')->stream();
    }
    public function countrydetail($id)
    {
        $country = Country::find($id);
        $pdf = PDF::loadView("user.findcountry.reports.countrydetail", compact('country'));
        $pdf->output();
        return $pdf->setPaper('a4')->stream();
    }

    public function bkup(Request $request)
    {

        $course_id = $request->course_id;
        $course = Course::find($course_id);
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
    }
}