<?php

namespace App\Http\Controllers;

use App\Models\InternationalApplication;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class InternationalApplicationController extends Controller
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
            $user = session('user');
            if ($request->ids && $user) {

                $application = Application::create(['user_id' => $user->id, 'charges' => 1000]);
                $ids = explode(',', $request->ids);

                foreach ($ids as $id) {
                    //$id_parts = explode('-', $id);
                    InternationalApplication::create(['application_id' => $application->id, 'country_id' => $id, 'course_id' => $request->course_id]);
                }
            }
            DB::commit();
            return redirect()->route("international_applications_success", ['id' => $application->id]);
        } catch (Exception $ex) {
            return redirect()->back()->withErrors('error', $ex->getMessage());
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InternationalApplication  $internationalApplication
     * @return \Illuminate\Http\Response
     */
    public function show(InternationalApplication $internationalApplication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InternationalApplication  $internationalApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(InternationalApplication $internationalApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InternationalApplication  $internationalApplication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InternationalApplication $internationalApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InternationalApplication  $internationalApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(InternationalApplication $internationalApplication)
    {
        //
    }
}