<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminController extends Controller {

	public function agents() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {

            return view('admin.agents');
        }

        return view('errors.notAuthorisedMessage');
    }

    public function admin() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {

            return view('admin.admin');
        }

        return view('errors.notAuthorisedMessage');
    }

    public function register() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {

            return view('admin.registration');
        }
    }

    public function postregister() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {

            $input = array(
                'id' => $_POST['id'],
                'f_name' => $_POST['f_name'],
                'l_name' => $_POST['l_name'],
                'email'  => $_POST['email'],
                'password' => $_POST['password']
            );

            return view('admin.handleRegistration')->with('input', $input);
        }

        return view('errors.notAuthorisedMessage');
    }
}