<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Exception;


class UserController extends Controller
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
        //signup  process
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required',

        ]);

        try {

            $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),

            ]);
            $user->save();

            //initiate user session
            session([
                'user' => $user,
            ]);
            if (isset($request->email))
                $user->email = $request->email;

            $user->save();
            return redirect('signup_success');
        } catch (Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage());
            // something went wrong
        }
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
        $user = User::find($id);
        //signup  process
        $request->validate([
            'current' => 'required',
            'new' => 'required',
        ]);

        //echo 'current:' . $request->current . "new" . $request->new . "existing" . $user->password;
        try {

            if (Hash::check($request->current, $user->password)) {
                $user->password = Hash::make($request->new);
                $user->save();
                return redirect()->back()->with('success', 'successfuly changed');
            } else {
                //password not found
                return redirect()->back()->withErrors("Password not found");;
            }
        } catch (Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage());
            // something went wrong
        }
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
    public function signin(Request $request)
    {
        //signin  process
        $request->validate([
            'phone' => 'required',
            'password' => 'required',

        ]);

        $phone = $request->phone;
        $password = $request->password;

        $user = User::where('phone', $phone)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                //authenticated, save into session
                session([
                    'user' => $user,
                    'usertype' => $user->usertype,
                    'mode' => 0,
                ]);
                if ($user->usertype == 'admin')
                    return redirect('admin');
                else if ($user->usertype == 'representative')
                    return redirect('representative');
                else if ($user->usertype == 'student')
                    return redirect('user_dashboard');
            } else {
                return redirect()->back()->with('error', "User not found");
            }
        } else {
            return redirect()->back()
                ->withErrors('Either phone or password incorrect');
        }
    }
    public function signout()
    {
        //destroy session
        session()->flush();
        return redirect('/');
    }
}