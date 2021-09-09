<?php

namespace App\Http\Controllers;

use App\Models\CouncelType;
use Illuminate\Http\Request;
use Exception;

class CouncelTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = CouncelType::all();
        return view('admin.primary.councel_types.index', compact('data'));
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
            'name' => 'required',
        ]);

        try {

            $new = CouncelType::create($request->all());
            $new->save();
            return redirect()->back()->with('success', 'Successfully created');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CouncelType  $councel_type
     * @return \Illuminate\Http\Response
     */
    public function show(CouncelType $councel_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CouncelType  $councel_type
     * @return \Illuminate\Http\Response
     */
    public function edit(CouncelType $councel_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CouncelType  $councel_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CouncelType $councel_type)
    {
        //
    }

    public function councel_types_update(Request $request)
    {
        //
        $request->validate([
            'id' => 'required',
            'name' => 'required',
        ]);

        $instance = CouncelType::find($request->id);
        $instance->name = $request->name;

        try {
            $instance->update();

            return redirect()->back()->with('success', 'Successfully updated');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CouncelType  $councel_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(CouncelType $councel_type)
    {
        //
        try {
            $councel_type->delete();
            return redirect()->back()->with('success', 'Successfully deleted');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }
}