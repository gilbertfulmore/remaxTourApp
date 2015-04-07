<?php namespace App\Http\Controllers;
/**
 * To Do: migrate custom emails from source code entry to database
 */
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller {

    /* Sends a email to the agent that the account is created for
       -use by register.blade.php */
    public function accountCreation() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {

            $message = 'Hello '.$_POST["f_name"].' '.$_POST["l_name"].', This is a notification '.
                       'that an account has been created for you on the RE\\MAX   bn App. '.
                       'User ID: '.$_POST["id"].' Password:'.$_POST["password"];

            Mail::raw($message, function($mail)
            {
                $subject = 'RE\\MAX Account Creation Notification';
                $mail->to($_POST["email"])->subject($subject);
            });

            return view('admin.registration');
        }
    }
    public function submitProperty() {

        if (Auth::user()) {

            $message = 'This is a reminder that your property submission will not be registered for '.
                       'a future tour until you confirm that the information provided in the submission'.
                       'is correct. property confirmations can be made on the "My Listings" page';

            Mail::raw($message, function($mail)
            {
                $subject = 'RE\\MAX Property Confirmation Reminder';
                $mail->to(Auth::user()->email)->subject($subject);
            });

            return view('pages.tours');
        }
    }
}