<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Country;
use App\Models\InternationalApplication;
use App\Models\NationalApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
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
        // return view('user.applications.index', compact('applications'));
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

        if ($user_mode == 0 && $search_mode == 'byname') { //find university by name

        }

        //find country by name
        if ($user_mode == 1 && $search_mode == 'byname') {

            $country_id = $request->country_id;

            DB::beginTransaction();
            try {
                $application = Application::create(['user_id' => $user->id, 'charges' => 1, 'mode' => 'international']);
                foreach ($ids as $id) { //course ids
                    InternationalApplication::create(['application_id' => $application->id, 'country_id' => $country_id, 'course_id' => $id]);
                }

                DB::commit();
                return redirect()->route("applications_success", ['id' => $application->id]);
            } catch (Exception $ex) {
                return redirect()->back()->withErrors('error', $ex->getMessage());
                DB::rollBack();
            }
        }


        //find country by course
        if ($user_mode == 1 && $search_mode == 'bycourse') {

            $course_id = $request->course_id;

            DB::beginTransaction();
            try {
                $application = Application::create(['user_id' => $user->id, 'charges' => 1, 'mode' => 1]);
                foreach ($ids as $id) { //course ids
                    //InternationalApplication::create(['application_id' => $application->id, 'country_id' => $id, 'course_id' => $course_id]);
                    echo "country" . $id . ", course" . $course_id . "app" . $application->id . "<br>";
                }

                DB::commit();
                //return redirect()->route("applications_success", ['id' => $application->id]);
            } catch (Exception $ex) {
                //return redirect()->back()->withErrors('error', $ex->getMessage());
                echo $ex->getMessage();
                DB::rollBack();
            }
        }






        // try {
        //     $user = session('user');
        //     if ($request->ids && $user) {

        //         $application = Application::create(['user_id' => $user->id, 'charges' => 1000]);
        //         $ids = explode(',', $request->ids);
        //         if (session('mode') == 0) { //national mode
        //             foreach ($ids as $id) {
        //                 //NationalApplication::create(['application_id' => $application->id, 'university_id' => $id_parts[0], 'course_id' => $id_parts[1]]);
        //             }
        //         }
        //         if (session('mode') == 1) { //international mode
        //             foreach ($ids as $id) {
        //                 //$id_parts = explode('-', $id);
        //                 InternationalApplication::create(['application_id' => $application->id, 'country_id' => $id, 'course_id' => $request->course_id]);
        //             }
        //         }
        //     }
        //     DB::commit();
        //     return redirect()->route("applications_success", ['id' => $application->id]);
        // } catch (Exception $ex) {
        //     return redirect()->back()->withErrors('error', $ex->getMessage());
        //     DB::rollBack();
        // }
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
        return view("user.applications.show", compact('application'));
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
    }
    public function success(Request $request)
    {
        $application = Application::find($request->id);
        return view("user.applications.success", compact('application'));
    }
    public function download(Request $request)
    {
        $application = Application::find($request->id);
        $profile = $application->user->profile();

        // echo "id" . $profile->id;

        $pdf = PDF::loadView("user.applications.download", compact('application', 'profile'));
        $pdf->output();
        return $pdf->setPaper('a4')->stream();
    }
}