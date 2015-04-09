@extends('app')

@section('title')Email Settings
@stop
@section('body')

    <?php
    // This is open-sourced software licensed under the MIT license

    if (isset($_POST['setSubmit'])) {
        // "Save Settings" Button pushed
    }

    if (isset($_POST['tempSubmit'])) {
        // "Save Template" Button pushed
        // TODO Add validation
        DB::insert('INSERT INTO email_templates (name, subject, body) VALUES (?, ?, ?)',
                   array($_POST['name'], $_POST['subject'], $_POST['body']));
    }

    if (isset($_POST['tempDelete'])) {
        // "Delete Template" Button pushed
    }

    $email_settings = DB::select('SELECT template, enabled
                              FROM email_settings
                              WHERE used_for = \'weeklyTour\'');

    // TODO Add error checking to see if there is more then one result
    $settings = $email_settings[0];
    // Checks to see if weekly emails are enabled
    $enabled = ($settings->enabled = 1 ? "checked" : "");
    ?>

    <div id="settings">
        <p><b>Weekly Email Settings</b></p>
        <p>
            <form action="" method="POST">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                <label>Email Template:</label>
                <input type="text" name="template"
                        value="<?php echo $settings->template;?>"><br>
                <h6>Setting the time, day and disabling the weekly email is currently not implemented</h6>
                <label>Time:</label>
                <input type="time" name="emailTime"><br>

                <label>Day:</label>
                <input type="date" name="emailDay"><br>

                <label>Enable:</label>
                <input type="checkbox" name="enableFlag" <?php echo $enabled;?>><br>

                <input type="submit" name="setSubmit" value="Save Settings">
            </form>
        </p>
    </div>
    <br>
    <div id="email_div">
        <form action="" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

            <label>Template Name: </label>
            <input type="text" name="name"><br>

            <label>Subject:</label>
            <input type="text" name="subject"><br>

            <textarea name="body" rows="4" cols="60"></textarea><br>

            <input type="submit" name="tempSubmit" value="Save Template">
            <input type="submit" name="tempDelete" value="Delete Template">
        </form>
    </div>

@stop
