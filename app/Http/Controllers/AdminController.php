<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    // register
    public function create()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('admins', 'email')],
            'password' => ['required', 'min:6'],
        ]);
        $formFields['password'] = bcrypt($formFields['password']);
        $user = admin::create($formFields);
        auth()->login($user);
        return redirect('/')->with('message', 'Admin created and logged in');
    }

    // logout

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/',)->with('message', 'You have been logged out!');

    }

    public function login()
    {
        return view('admin.login');

    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials, true)) {
            $request->session()->regenerate();
            return redirect('/home')->with('message', 'You are now logged in!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }

}

