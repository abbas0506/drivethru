<?php

namespace App\Http\Controllers;

use App\Models\Favcourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class FavcourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $country = session('country');
        return view('admin.countries.favcourses.index', compact('country'));
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
        $country = session('country');
        DB::beginTransaction();
        try {
            if ($request->course_ids) {
                $course_ids = explode(',', $request->course_ids);
                foreach ($course_ids as $course_id) {
                    Favcourse::create(['country_id' => $country->id, 'course_id' => $course_id]);
                }
            }
            DB::commit();
            return redirect()->back()->with('success', 'Scuccesful');
        } catch (Exception $ex) {
            return redirect()->back()->withErrors('error', $ex->getMessage());
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favcourse  $favcourse
     * @return \Illuminate\Http\Response
     */
    public function show(Favcourse $favcourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favcourse  $favcourse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $country = session('country');
        return view('admin.countries.favcourses.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Favcourse  $favcourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favcourse $favcourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favcourse  $favcourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favcourse $favcourse)
    {
        //
        $favcourse->delete();
        return redirect()
            ->back()
            ->with('success', 'Successfully removed');
    }
}