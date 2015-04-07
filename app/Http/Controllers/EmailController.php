<?php namespace App\Http\Controllers;
/**
 * To Do: migrate custom emails from source code entry to database
 */
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller {

    /* When a new account is created the new account owner is notified by email */
    public function accountCreation() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {

            $message = 'Hello '.$_POST["f_name"].' '.$_POST["l_name"].', This is a notification '.
                       'that an account has been created for you on the RE\\MAX tour App. '.
                       'User ID: '.$_POST["id"].' Password:'.$_POST["password"];

            Mail::raw($message, function($mail)
            {
                $subject = 'RE\\MAX Account Creation Notification';
                $mail->to($_POST["email"])->subject($subject);
            });

            return 'Account Created Successfully! - <a href="register">Click here to continue</a>';
        }
    }

    /* Reminds agent by email to confirm property listing */
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

            return 'Listing Submitted! - <a href="tours">Click here to continue</a>';
        }
    }
}