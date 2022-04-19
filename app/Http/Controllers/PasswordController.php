<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Exception;

class PasswordController extends Controller
{
    //
    public function update(Request $request, $id)
    {
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
}