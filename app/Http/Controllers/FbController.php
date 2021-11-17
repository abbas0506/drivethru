<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
//use Validator;
use Laravel\Socialite\Facades\Socialite; // as Socialite;
use Exception;

class FbController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookSignin()
    {
        try {

            $user = Socialite::driver('facebook')->user();
            $facebookId = User::where('facebook_id', $user->id)->first();
            return 'done';
            // if ($facebookId) {
            //     // Auth::login($facebookId);
            //     return redirect('/');
            // } else {
            //     $newuser = User::create([
            //         'name' => $user->name,
            //         'email' => $user->email,
            //         'facebook_id' => $user->id,
            //         'password' => encrypt('000')
            //     ]);
            //     $newuser->save();
            //     // Auth::login($createUser);
            //     return redirect('user_dashboard');
            // }
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
}