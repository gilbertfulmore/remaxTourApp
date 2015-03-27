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

    public function edittours() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {

            return view('admin.edittours');
        }

        return view('errors.notAuthorisedMessage');
    }

    public function markremove() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {

            return view('admin.markremove');
        }

        return view('errors.notAuthorisedMessage');
    }
    public function postremovetour() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {
            $input = $_POST['property_id'];
            return view('admin.removetour')->with('input', $input);
        }

        return view('errors.notAuthorisedMessage');
    }

    public function postmarkremove() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {
            $input = $_POST['property_id'];
            return view('admin.markremove')->with('input', $input);
        }

        return view('errors.notAuthorisedMessage');
    }

    public function postmarksubmit() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {
            $input = $_POST['property_id'];
            return view('admin.marksubmit')->with('input', $input);
        }

        return view('errors.notAuthorisedMessage');
    }

    public function postnewtour() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {
            $input = $_POST['property_id'];
            return view('admin.newtour')->with('input', $input);
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
                'password' => $_POST['password'],
                'authl' => $_POST['authl']
            );

            return view('admin.handleRegistration')->with('input', $input);
        }


        return view('errors.notAuthorisedMessage');
    }

    public function edituser() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {

            return view('admin.user');
        }
    }

    public function postedituser() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {

            $input = array(
                'id' => $_POST['id'],
                'f_name' => $_POST['f_name'],
                'l_name' => $_POST['l_name'],
                'email'  => $_POST['email'],
                'password' => $_POST['password'],
                'authl' => $_POST['authl']
            );

            return view('admin.handleuser')->with('input', $input);
        }


        return view('errors.notAuthorisedMessage');
    }

}