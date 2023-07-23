<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    //
     public function showLoginForm()
    {
        return view('login');
    }
     public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
            if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('/');
        } else {
            // Authentication failed
            return back()->withErrors(['email' => 'Invalid credentials']);
        }

    }
    public function store(Request $request)
{
     // $teacher = new Teacher;
        // $teacher->name=$request->name;
        // $teacher->email=$request->email;
        $request->validate([
            'email' => 'required|email|unique:students,email',
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address is already in use.',
        ]);
        $user = new User;
        $user->email = $request->input('email');
        $user->password = $request->input('password');
       
      if ($user->save()) {
            return redirect()->route('addteacher')->with('success', 'Login successfully.');
        } else {
            return redirect()->route('/')->with('error', 'Login Again');
        }
    }
}
