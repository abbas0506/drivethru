<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Models\Application;
use App\Models\Appdetail;
use App\Models\Fappdetail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
//use Barryvdh\DomPDF\PDF as DomPDFPDF;
//use Barryvdh\DomPDF\PDF as PDF;
//use PDF;
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
        $applications = Application::all();
        return view('user.applications.index', compact('applications'));
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

        DB::beginTransaction();

        try {
            $user = session('user');
            if ($request->ids && $user) {

                $application = Application::create(['user_id' => $user->id, 'charges' => 1000]);
                $ids = explode(',', $request->ids);
                if (session('mode') == 0) { //national mode
                    foreach ($ids as $id) {
                        $id_parts = explode('-', $id);
                        Appdetail::create(['application_id' => $application->id, 'university_id' => $id_parts[0], 'course_id' => $id_parts[1]]);
                    }
                }
                if (session('mode') == 1) { //international mode
                    foreach ($ids as $id) {
                        $id_parts = explode('-', $id);
                        Fappdetail::create(['application_id' => $application->id, 'country_id' => $id_parts[0]]);
                    }
                }
            }
            DB::commit();
            return redirect()->route("applications_success", ['id' => $application->id]);
        } catch (Exception $ex) {
            return redirect()->back()->withErrors('error', $ex->getMessage());
            DB::rollBack();
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