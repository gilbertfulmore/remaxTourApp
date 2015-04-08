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

    public function organize() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {

            return view('admin.organize');
        }
    }

    public function changetour() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {

            return view('admin.changetour');
        }
    }

    public function edituser() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {

            return view('admin.user');
        }
    }

    public function handlechange() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {

            return view('admin.handlechange');
        }
    }

    public function newtour() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {
            $input = $_POST['property_id'];
            return view('admin.newtour')->with('input', $input);
        }
    }

    public function reorganize() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {
            $input = array(['property_id' => $_POST['property_id']], ['new' =>$_POST['res']], ['old' =>$_POST['rank']]);
            return view('admin.reorganize')->with('input', $input);
        }
    }

    public function edittours() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {

            return view('admin.edittours');
        }

        return view('errors.notAuthorisedMessage');
    }
    public function removetour() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {
            $input = array(['test' => '3'], ['prop' => $_POST['property_id']]);
            return view('admin.mastertour')->with('input', $input);
        }

        return view('errors.notAuthorisedMessage');
    }

    public function markremove() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {
            $input = array(['test' => '2'], ['prop' => $_POST['property_id']]);
            return view('admin.mastertour')->with('input', $input);
        }

        return view('errors.notAuthorisedMessage');
    }

    public function marksubmit() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {
            $input = array(['test' => 1], ['prop' => $_POST['property_id']]);
            return view('admin.mastertour')->with('input', $input);
        }

        return view('errors.notAuthorisedMessage');
    }
}
