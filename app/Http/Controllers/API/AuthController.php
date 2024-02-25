<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($validator)){
            $user = Auth::user();
            Log::create([
                'activity' => $user->username.' telah Login ',
                'user_id' => $user->id,
            ]);
            if($user->role == 'admin'){
                return redirect()->route('homeadmin')->with('message', 'Login Successfully');
            } elseif($user->role == 'owner'){
                return redirect()->route('owner.dashboard')->with('message', 'Login Successfully');
            } else {
                return redirect()->route('movie')->with('message', 'Login Successfully');
            }
        } else {
            return back()->with('message', 'username or password incorrect');
        }

    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();

            Auth::logout();

            Log::create([
                'activity' => $user->username.' telah Logout ',
                'user_id' => $user->id,
            ]);

            return redirect()->route('formlogin')->with('message', 'Logout Successfully');
        }

        return redirect()->back()->with('message', 'User tidak ada');
    }


    public function changePassword()
    {
        return view('auth.change_password');
    }

    public function updatePassword(Request $request)
    {
        $auth = Auth::user();
        if ($auth) {
            $new_password = $request->new_password;
            $new_password_confirmation = $request->new_password_confirmation;

            if ($new_password == $new_password_confirmation) {
                $auth->update([
                    'password' => Hash::make($new_password)
                ]);

                return redirect()->route('movie');
            } else {
                return redirect()->back()->with('message', 'password harus sama');
            }
        } else {
            return redirect()->back()->with('message', 'Anda tidak bisa mengakses ini');
        }
    }
}
