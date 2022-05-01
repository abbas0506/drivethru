<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Country;
use App\Models\InternationalApplication;
use App\Models\NationalApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Exception;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $applications = Application::all();
        // return view('student.applications.index', compact('applications'));
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
            'search_mode' => 'required',
        ]);
        $search_mode = $request->search_mode;
        $ids = explode(',', $request->ids);
        $user = session('user');
        $user_mode = session('mode');

        //find university by name
        if ($user_mode == 0 && $search_mode == 'byname') {
            $university_id = $request->university_id;

            DB::beginTransaction();
            try {
                $application = Application::create(['user_id' => $user->id, 'charges' => 1, 'mode' => 0]);
                foreach ($ids as $id) { //course ids
                    NationalApplication::create(['application_id' => $application->id, 'university_id' => $university_id, 'course_id' => $id]);
                }

                DB::commit();
                return redirect()->route("applications_success", ['id' => $application->id]);
            } catch (Exception $ex) {
                //return redirect()->back()->withErrors('error', $ex->getMessage());
                echo $ex->getMessage();
                DB::rollBack();
            }
        }

        //find university by course
        if ($user_mode == 0 && $search_mode == 'bycourse') {

            $university_id = $request->university_id;

            DB::beginTransaction();
            try {
                $application = Application::create(['user_id' => $user->id, 'charges' => count($ids), 'mode' => $user_mode]);
                foreach ($ids as $id) { //compostiet ids
                    $id_parts = explode('-', $id);
                    NationalApplication::create(['application_id' => $application->id, 'university_id' => $id_parts[0], 'course_id' => $id_parts[1]]);
                }

                DB::commit();
                return redirect()->route("applications_success", ['id' => $application->id]);
            } catch (Exception $ex) {
                //return redirect()->back()->withErrors('error', $ex->getMessage());
                echo $ex->getMessage();
                DB::rollBack();
            }
        }
        //find country by name
        if ($user_mode == 1 && $search_mode == 'byname') {

            $country_id = $request->country_id;

            DB::beginTransaction();
            try {
                $application = Application::create(['user_id' => $user->id, 'charges' => count($ids), 'mode' => 1]);
                foreach ($ids as $id) { //course ids
                    InternationalApplication::create(['application_id' => $application->id, 'country_id' => $country_id, 'course_id' => $id]);
                }

                DB::commit();
                return redirect()->route("applications_success", ['id' => $application->id]);
            } catch (Exception $ex) {
                //return redirect()->back()->withErrors('error', $ex->getMessage());
                echo $ex->getMessage();
                DB::rollBack();
            }
        }


        //find country by course
        if ($user_mode == 1 && $search_mode == 'bycourse') {

            $course_id = $request->course_id;

            DB::beginTransaction();
            try {
                $application = Application::create(['user_id' => $user->id, 'charges' => count($ids), 'mode' => 1]);
                foreach ($ids as $id) { //course ids
                    InternationalApplication::create(['application_id' => $application->id, 'country_id' => $id, 'course_id' => $course_id]);
                }

                DB::commit();
                return redirect()->route("applications_success", ['id' => $application->id]);
            } catch (Exception $ex) {
                //return redirect()->back()->withErrors('error', $ex->getMessage());
                echo $ex->getMessage();
                DB::rollBack();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
        return view("student.applications.show", compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
        // $counselling = Counselling::find($id);
        try {
            $application->delete();
            return redirect()->back()->with('success', 'Successfully deleted');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }
    public function success(Request $request)
    {
        $application = Application::find($request->id);
        return view("student.applications.success", compact('application'));
    }
    public function download(Request $request)
    {
        $application = Application::find($request->id);
        $profile = $application->user->profile();

        $pdf = PDF::loadView("student.applications.download", compact('application', 'profile'));
        $pdf->output();
        return $pdf->setPaper('a4')->stream();
    }
    public function voucher(Request $request)
    {

        $application = Application::find($request->id);
        $profile = $application->user->profile();

        $issuedate = Carbon::now();
        $duedate = Carbon::now()->addDays(5);

        //if due on sunday, then move it to next day i.e monday
        if ($duedate->dayOfWeek == 0) $duedate->addDays(1);

        $applicationSr = $application->id;
        if ($applicationSr < 10) $applicationSr = '0' . $applicationSr;

        $depositSlipId = Carbon::now()->format('Y') . '-' . $applicationSr;

        $inwords = '';
        if ($application->charges == 1) $inwords = 'One hundred and fifty rupees only';
        else if ($application->charges == 2) $inwords = 'Three hundred rupees only';
        else if ($application->charges == 3) $inwords = 'Four hundred and fifty rupees only';
        else if ($application->charges == 4) $inwords = 'Six hundred rupees only';
        else if ($application->charges == 5) $inwords = 'Seven hundred and fifty rupees only';
        else if ($application->charges == 6) $inwords = 'Nine hundred rupees only';
        else if ($application->charges == 7) $inwords = 'One thousand and fifty rupees only';

        $pdf = PDF::loadView("student.applications.voucher", compact('application', 'issuedate', 'duedate', 'depositSlipId', 'inwords'))->setPaper('a4', 'landscape');
        $pdf->output();
        return $pdf->stream();
        return $pdf->setPaper('a4')->stream(); # code...
    }
}