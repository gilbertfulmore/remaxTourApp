<?php namespace App\Http\Controllers;

// This file is part of open-sourced software licensed under the MIT license

use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller {

	public function login() {

        return view('pages.login');
    }

    public function auth() {

        if (Auth::attempt(['id' => $_POST["agent_id"], 'password' => $_POST['password']])) {

            return "Login successful, <a href='home'>go home</a>";
        }

        return "Login Failed, <a href='login'>Try Again</a>";
    }

    public function logout() {

        Auth::logout();

        return redirect('/');
    }
}
