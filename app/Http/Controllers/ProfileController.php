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
        return view('user.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.profile.create');
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
        return view('user.profile.edit', compact('profile'));
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
    public function change_pic(Request $request)
    {
        $request->validate([
            'pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = session('user');
        if ($request->hasFile('pic')) {
            //unlink old image
            $destination_path = public_path('images/users/');
            //unlink(storage_path('app/public/images/profile/' . $profile->pic));

            //never destroy default.png as it is used as default image for every new user
            if (!$user->pic == 'default.png') {
                $file_path = $destination_path . $user->pic;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }


            //save new pic after renaming
            $file_name = $user->id . '.' . $request->pic->extension();
            //->move(public_path('images'), $imageName);
            $request->file('pic')->move(public_path('images/users'), $file_name);
            //->storeAs($destination_path, $file_name);
            $user->pic = $file_name;
        }

        try {
            $user->update();
            return redirect()->route('profiles.index')->with('success', 'Image uploaded successfully');
        } catch (Exception $ex) {
            return redirect()->back()
                ->withErrors($ex->getMessage()());
        }
    }
}