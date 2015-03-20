<?php namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller {

	public function login() {

        if (Auth::attempt(['id' => 7, 'password' => 'password'])) {

            return 'Win';
        }

        return 'Fail';
    }

    public function logout() {

        Auth::logout();

        return redirect('/');
    }
}
