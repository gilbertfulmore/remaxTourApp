<!-- This file is part of open-sourced software licensed under the MIT license -->

<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminController extends Controller {

    public function admin() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {

            return view('admin.admin');
        }

        return view('errors.notAuthorisedMessage');
    }

    public function agents() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {

            return view('admin.agents');
        }

        return view('errors.notAuthorisedMessage');
    }

    public function register() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {

            return view('admin.registration');
        }
    }

    public function edituser() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {

            return view('admin.user');
        }
    }

    public function edittours() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {

            return view('admin.edittours');
        }

        return view('errors.notAuthorisedMessage');
    }
    public function removetour() {

        // TODO
    }

    public function email_settings() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {

            return view('admin.email_settings');
        }

        return view('errors.notAuthorisedMessage');
    }
}
