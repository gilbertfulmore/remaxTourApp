@extends('app')
@section('title')Help Page
@stop
@section('body')

    <div class="contentheader">Agents</div>
    <div class="contentblock">
<?php   // DB is a Laravel API call, See http://laravel.com/docs/5.0/database for more info
        $agents = DB::select('select * from agents');

        foreach ($agents as $agent) {

            echo "<table class='datatable'>";
            echo "<tr><th>Name:</th><td>".$agent->f_name." ".$agent->l_name."</td></tr>";
            echo "<tr><th>Agent ID:</th><td>".$agent->id."</td></tr>";
            echo "<tr><th>Email:</th><td>".$agent->email."</td></tr>";
            echo "<tr><th>Type:</th><td>".$agent->auth_level."</td></tr>";
            echo "<tr><th>
                        <form method='post' action='map'>
                            <input type='hidden' name='_token' value='" . csrf_token() . "'>
                            <input type='hidden' name='uid' value='" . $agent->id . "'>
                            <input type='submit' name='u_edit' value='Edit' class='databutton'/>
                        </form>
                    </th><td>
                        <form method='post' action='map'>
                            <input type='hidden' name='_token' value='" . csrf_token() . "'>
                            <input type='hidden' name='uid' value='" . $agent->id . "'>
                            <input type='submit' name='u_remove' value='Remove' class='databutton'/>
                        </form>
                    </td></tr>";
            echo "</table>";
        }
?>
</div>
@stop