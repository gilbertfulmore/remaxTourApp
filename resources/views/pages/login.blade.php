<!-- This file is part of open-sourced software licensed under the MIT license -->

@extends('app')
@section('title')Login Page
@stop
@section('body')
    <div class='contentheader'>User Login</div>
    <div class='contentblock'>
        <p>
            user #1 with password 'dangerzone' is an admin<br/>
            user #2 with password 'password' is an agent
        </p>
        <form method="post" action="login">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="number" name="agent_id" placeholder="agent id"/>
            <input type="password" name="password" placeholder="password"/>
            <p><input type="submit" name="submit" value="Login"/></p>
        </form>
    </div>

@stop

