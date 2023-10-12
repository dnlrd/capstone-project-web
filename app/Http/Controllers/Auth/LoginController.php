<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
class LoginController extends Controller
{
    // Show the login form
    public function index()
    {
        return view('auth.login');
    }

    // Handle user login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'User not found'])->withInput();
        }

        if (Auth::attempt($request->only('email', 'password'))) {
         
            Auth::user()->update(['online_status' => true]);

            if ($user->role === 1) { 
                return redirect()->route('records'); 
            }

            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::user()->update(['online_status' => false]);
        Auth::logout();

        return redirect()->route('login');
    }
}
