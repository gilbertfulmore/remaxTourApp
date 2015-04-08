<?php namespace App\Http\Controllers;

use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

    public function index() {

        return view('pages.home');
    }

    public function help() {

        return view('pages.help');
    }

    public function tours() {

        if (Auth::user()) {

            return view('pages.tours');
        }

        return view('errors.notAuthorisedMessage');
    }

    public function listings() {

        if (Auth::user()) {

            $agent_id = Auth::user()->id;

            return view('pages.mylistings')->with('agent_id', $agent_id);
        }

        return view('errors.notAuthorisedMessage');
    }

    public function postconfirm() {

        if (Auth::user()) {

            $input = array(
                ['prop_id' => $_POST['prop_id']]
            );

            return view('pages.handleconfirm')->with('input', $input);
        }

        return view('errors.notAuthorisedMessage');
    }

    public function postsearch_mls() {

        if (Auth::user()) {

            $agent_id = Auth::user()->id;

            $input = array(
                ['agent_id' => $agent_id],
                ['mls' => $_POST['s_mls']]
            );

            return view('pages.search_mls')->with('input', $input);
        }

    }

    public function postsearch_add() {

        if (Auth::user()) {

            $agent_id = Auth::user()->id;

            $input = array(
                ['agent_id' => $agent_id],
                ['add' => $_POST['s_add']]
            );

            return view('pages.search_add')->with('input', $input);
        }

    }

    public function submit() {

        if (Auth::user()) {

            $agent_id = Auth::user()->id;

            return view('pages.submitproperty')->with('agent_id', $agent_id);
        }

    }

    public function tourSummary() {

        if (Auth::user()) {

            $agent_id = Auth::user()->id;

            return view('pages.tourSummary')->with('agent_id', $agent_id);
        }

        return view('errors.notAuthorisedMessage');
    }

    public function map() {

        if (Auth::user()) {

            $agent_id = Auth::user()->id;

            return view('pages.map')->with('agent_id', $agent_id);
        }
    }

    public function view_listing() {

        if (Auth::user()) {

            $prop_id = $_POST["prop_id"];

            return view('pages.viewlisting')->with('prop_id', $prop_id);
        }

    }

    public function edit_listing() {
        if (Auth::user()) {

            $input = array(
                ['p_id' => $_POST['prop_id']],
                ['p_address' => $_POST['prop_add']],
                ['p_sqfeet' => $_POST['prop_sq']],
                ['p_mls' => $_POST['prop_mls']],
                ['p_district_code' => $_POST['prop_dist']]
            );

            return view('pages.handleeditlisting')->with('input', $input);
        }
        return view('errors.notAuthorisedMessage');
    }

<<<<<<< HEAD
}
=======
}
>>>>>>> 2e42508fb0dbed7fc3f654b10b78856441ae02c9
