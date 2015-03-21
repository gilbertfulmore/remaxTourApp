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

        return 'You are not authenticated enough to see the shadow page!';
    }

    public function agents() {

    }

	public function index() {

        return view('pages.home');
    }
}