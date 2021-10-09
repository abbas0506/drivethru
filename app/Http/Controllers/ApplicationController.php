<?php

namespace App\Http\Controllers;

use App\Models\Appdetail;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            if ($request->ids) {
                $application = Application::create(['profile_id' => 1, 'step1' => 1]);
                $ids = explode(',', $request->ids);
                foreach ($ids as $id) {
                    $id_parts = explode('-', $id);
                    Appdetail::create(['application_id' => $application->id, 'university_id' => $id_parts[0], 'course_id' => $id_parts[1]]);
                }
            }
            DB::commit();
            return redirect()->route("applications.show", [$application]);
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
        return view('national.applications.success', compact('application'));
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
}