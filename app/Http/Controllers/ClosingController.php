<?php

namespace App\Http\Controllers;

use App\Models\Unicourse;
use App\Models\University;
use Exception;
use Illuminate\Http\Request;

class ClosingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $universities = University::all();
        return view('representative.closing.index', compact('universities'));
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
        $unicourse = Unicourse::find($id);
        return view('representative.closing.edit', compact('unicourse'));
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
        $unicourse = Unicourse::find($id);
        try {
            $unicourse->closing = $request->closing;
            $unicourse->save();
            return redirect('closing/courselist/' . $unicourse->university_id)->with('success', 'Successfully updated');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'error occcured' . $ex->getMessage());
        }
        echo $id . "," . $request->closing;
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
    public function courselist($id)
    {
        $university = University::find($id);
        $courses = $university->unicourses();
        return view('representative.closing.courselist', compact('university'));
    }
}