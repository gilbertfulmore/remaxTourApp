<?php namespace App\Http\Controllers;

use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

    public function shadow() {

        if (Auth::user()) {

            return view('pages.shadow');
        }

        return view('errors.notAuthorisedMessage');
    }

    public function index() {

        return view('pages.home');
    }

    public function help() {

        return view('pages.help');
    }

    public function tours() {

        if (Auth::user()) {

            //$name = Auth::user()->f_name;

            return view('pages.tours');
        }

        return view('errors.notAuthorisedMessage');
    }

    public function mylistings() {

        if (Auth::user()) {

            $agent_id = Auth::user()->id;

            return view('pages.mylistings')->with('agent_id', $agent_id);
        }
    }

    public function viewlisting() {

        if (Auth::user()) {

            return view('pages.viewlisting');
        }

    }

    public function editlisting() {

        if (Auth::user()) {

            return view('pages.viewlisting');
        }

    }

    public function posteditlisting() {

        if (Auth::user()) {

            $input = array(
                ['old_pid' => $_POST['old_pid']],
                ['p_id' => $_POST['p_id']],
                ['p_address' => $_POST['p_add']],
                ['p_sqfeet' => $_POST['p_sq']],
                ['p_mls' => $_POST['p_mls']],
                ['p_district_code' => $_POST['p_dist']]
            );

            return view('pages.handleeditlisting')->with('input', $input);
        }

        return view('errors.notAuthorisedMessage');
    }

    public function submitproperty() {

        if (Auth::user()) {

            $agent_id = Auth::user()->id;

            return view('pages.submitproperty')->with('agent_id', $agent_id);
        }

    }

    public function submit() {

        if (Auth::user()) {

            return view('pages.submitproperty');
        }

    }

    public function postsubmit() {

        if (Auth::user()) {

            $input = array(
                ['s_id' => $_POST['sub_ID']],
                ['s_address' => $_POST['sub_add']],
                ['s_sq_feet' => $_POST['sub_sqr']],
                ['s_district_code' => $_POST['sub_dist']],
                ['s_mls' => $_POST['sub_mls']],
                ['s_agent_id' => $_POST['agent_id']],
                ['s_created_on' => 'now()'],
                ['s_tour_id' => '1'],
                ['s_property_id' => $_POST['sub_ID']],
                ['s_status' => 'S']
            );

            return view('pages.handleSubmit')->with('input', $input);
        }

        return view('errors.notAuthorisedMessage');
    }
}
