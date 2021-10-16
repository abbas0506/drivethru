<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\models\User;
use Exception;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('profile.index');
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
            'fname' => 'required',
            'mname' => 'required',
            'cnic' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'address' => 'required',

        ]);

        try {
            $profile = Profile::create($request->all());
            $profile->save();
            return redirect()->route('profiles.index')->with('success', 'Successfully saved');
        } catch (Exception $ex) {
            return redirect()->back()
                ->withErrors($ex->getMessage()());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
        $request->validate([
            'fname' => 'required',
            'mname' => 'required',
            'cnic' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'address' => 'required',

        ]);

        try {
            $profile = $profile->update($request->all());
            return redirect('profiles');
        } catch (Exception $ex) {
            return redirect()->back()
                ->withErrors($ex->getMessage()());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}