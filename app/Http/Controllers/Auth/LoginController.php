<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function store(Request $request) {
        //validate
        $this -> validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //sign in
        if(!auth() -> attempt($request -> only('email', 'password'))) {
            //if not authenticated
            return back() -> with('status', 'Invalid login details');
        }

        //redirect
        return redirect() -> route('dashboard');
    }
}
