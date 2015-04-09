<!-- This file is part of open-sourced software licensed under the MIT license -->

<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class EmailController extends Controller {

    /* When a new account is created the new account owner is notified by email */
    public function accountCreation() {

        if (Auth::user() && Auth::user()->auth_level == 'admin') {

            $result = DB::select('select body from email_templates where name = \'accountCreation\'');

            foreach($result as $results) {
                $message = $results->body;
            }

            $message = str_replace('[f_name]',   $_POST['f_name'],   $message);
            $message = str_replace('[l_name]',   $_POST['l_name'],   $message);
            $message = str_replace('[id]',       $_POST['id'],       $message);
            $message = str_replace('[password]', $_POST['password'], $message);

            Mail::raw($message, function($mail) {
                $result = DB::select('select subject from email_templates where name = \'accountCreation\'');
                foreach($result as $results) {
                    $subject = $results->subject;
                }
                $mail->to($_POST["email"])->subject($subject);
            });

            return 'Account Created Successfully! - <a href="register">Click here to continue</a>';
        }
    }

    /* Reminds agent by email to confirm property listing */
    public function submitProperty() {

        if (Auth::user()) {

            $result = DB::select('select body from email_templates where name = \'propertySubmission\'');

            foreach($result as $results) {
                $message = $results->body;
            }

            Mail::raw($message, function($mail) {
                $result = DB::select('select subject from email_templates where name = \'propertySubmission\'');

                foreach($result as $results) {
                    $subject = $results->subject;
                }

                $mail->to(Auth::user()->email)->subject($subject);
            });

            return 'Listing Submitted! - <a href="tours">Click here to continue</a>';
        }
    }
}
