<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\models\User;
use Exception;
use Illuminate\Support\Facades\File;

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
        return view('student.profile.personal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('student.profile.personal.create');
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
        return view('student.profile.personal.edit', compact('profile'));
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
        //delete old image and replace it by new image
        $image_name = '';
        $image_extension = '';
        $image_version = 0; //version is being used to fix cache refresh issue

        $image_path = public_path('images/users/');
        $user = session('user');    //current user

        $file_name = '';
        $file_path = '';
        $destination_path = public_path('images/users/');

        $request->validate([
            'pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if ($request->hasFile('pic')) {

            //if avatar is default image

            if ($user->pic == 'default.png') {
                //do nothing with image itself
                //set image version to 0
                $image_version = 0;
            } else {
                //delete old image and increase version no. by 1
                $file_url = $image_path . $user->pic;

                if (file_exists($file_url)) {
                    // unlink($file_path);
                    File::delete($file_url);
                    echo 'deleted';
                }

                //get version no. of the current image
                $current_image_name = $user->pic;
                $pieces = explode('.', $current_image_name);
                if (sizeof($pieces) > 1) {
                    $image_name = $pieces[0];
                    $image_name_pieces = explode('-', $image_name);
                    // echo $image_name;
                    if (sizeof($image_name_pieces) > 1) {
                        $image_version = $image_name_pieces[1];
                        $image_version++;
                    }
                }
            }


            //constrcut full name of new image
            $image_name = $user->id . '-' . $image_version . '.' . $request->pic->extension();
            //->move(public_path('images'), $imageName);

            $request->file('pic')->move($image_path, $image_name);
            //->storeAs($destination_path, $file_name);
            $user->pic = $image_name;
        }

        try {
            $user->update();
            // echo "image name:" . $image_name;
            // echo $file_name . "path" . $file_path;;
            return redirect()->route('profiles.index')->with('success', 'Image uploaded successfully');
        } catch (Exception $ex) {
            return redirect()->back()
                ->withErrors($ex->getMessage()());
        }
    }
}