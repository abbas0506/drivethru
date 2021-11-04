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

            return view('user.findcountry.listofcountries', compact('countries'));
        } else {
            // auto search request
            $request->validate([
                'course_id' => 'required',
            ]);

            $course_id = $request->course_id;
            $course = Course::find($course_id);
            try {

                //compute living costs of each country
                $livingcosts = Livingcost::selectRaw('country_id, (min(minexp)+max(maxexp))/2 as avgcost')
                    ->groupBy('country_id');

                if (isset($request->minlivingcost) && isset($request->maxlivingcost)) {
                    $livingcosts = $livingcosts->havingRaw("avgcost between " . $request->minlivingcost . " and " . $request->maxlivingcost);
                } else if (isset($request->minlivingcost)) {
                    $livingcosts = $livingcosts->havingRaw("avgcost >= " . $request->minlivingcost);
                } else if (isset($request->maxlivingcost)) {
                    $livingcosts = $livingcosts->havingRaw("avgcost <= " . $request->maxlivingcost);
                }

                //compute study costs of each country
                $studycosts = Studycost::selectRaw('country_id, (min(minfee)+max(maxfee))/2 as avgcost')
                    ->groupBy('country_id');

                if (isset($request->minstudycost) && isset($request->maxstudycost)) {
                    $studycosts = $studycosts->havingRaw("avgcost between " . $request->minstudycost . " and " . $request->maxstudycost);
                } else if (isset($request->minstudycost)) {
                    $studycosts = $studycosts->havingRaw("avgcost > " . $request->minstudycost);
                } else if (isset($request->maxstudycost)) {
                    $studycosts = $studycosts->havingRaw("avgcost < " . $request->maxstudycost);
                }

                $countries = Country::select('countries.id', 'countries.name', 'essential')
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
                    'selected_course' => $course,
                    'countries' => $countries,
                ]);

                return view('user.findcountry.listofcountries', compact('countries'));
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
        $countries = session('countries');
        $course = session('selected_course');
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

    public function apply()
    {
        //return apply page
        $countries = session('countries');
        return view('user.findcountry.apply', compact('countries'));
    }
}