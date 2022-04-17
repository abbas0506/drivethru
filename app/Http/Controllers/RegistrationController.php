<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class RegistrationController extends Controller
{
    //
    public function index()
    {
        $students = User::all()->where('usertype', 'student')->sortByDesc('id');
        return view('representative.registrations.index', compact('students'));
    }
    public function show($userid)
    {
        //
        $user = User::find($userid);
        return view('representative.registrations.show', compact('user'));
    }

    public function update(Request $request, $userid)
    {
        $request->validate([
            'status' => 'required',
        ]);

        try {

            $user = User::find($userid);
            $user->status = $request->status;
            $user->update();
            return redirect()->back()->with('success', 'Successfully created');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }
    public function recent()
    {
    }
    public function between(Request $request)
    {
    }
}