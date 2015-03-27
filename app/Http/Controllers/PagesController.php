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

        //TODO
    }

    public function postconfirm() {

        if (Auth::user()) {

            $agent_id = Auth::user()->id;

            return view('pages.handleconfirm')->with('agent_id', $agent_id);
        }

        return view('errors.notAuthorisedMessage');
    }

    public function postsearch_mls() {

        if (Auth::user()) {

            $agent_id = Auth::user()->id;

            return view('pages.search_mls')->with('agent_id', $agent_id);
        }

    }

    public function postsearch_add() {

        if (Auth::user()) {

            $agent_id = Auth::user()->id;

            return view('pages.search_add')->with('input', $agent_id);
        }

    }

    public function submit() {

        if (Auth::user()) {

            return view('pages.submitproperty');
        }

    }

    public function tourSummary() {

        return view('pages.tourSummary');
    }

    public function map() {

        if (Auth::user()) {

            $agent_id = Auth::user()->id;

            return view('pages.map')->with('agent_id', $agent_id);
        }
    }
}