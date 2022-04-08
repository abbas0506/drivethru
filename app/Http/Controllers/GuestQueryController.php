<?php

namespace App\Http\Controllers;

use App\Models\GuestQuery;
use Illuminate\Http\Request;
use Exception;

class GuestQueryController extends Controller
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
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        try {

            $new = GuestQuery::create($request->all());
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
     * @param  \App\Models\GuestQuery  $guestQuery
     * @return \Illuminate\Http\Response
     */
    public function show(GuestQuery $guestQuery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GuestQuery  $guestQuery
     * @return \Illuminate\Http\Response
     */
    public function edit(GuestQuery $guestQuery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GuestQuery  $guestQuery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GuestQuery $guestQuery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GuestQuery  $guestQuery
     * @return \Illuminate\Http\Response
     */
    public function destroy(GuestQuery $guestQuery)
    {
        //
    }
}