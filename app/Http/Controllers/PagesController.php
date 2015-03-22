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

}