<!-- This file is part of open-sourced software licensed under the MIT license -->

@extends('app')

@section('title')Realty Tour App @stop

@section('body')
<html>
<head>
    <title>Agent Registration Page</title>
</head>
<body>
<p>
<h1>This is the Admin's Agent Registration Page</h1>
</p>
<form method="post" action="register">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <p>Agent ID<br/>
        <input type="number" name="id"/>
    </p>
    <p>First Name<br/>
        <input type="text" name="f_name"/>
    </p>
    <p>Last Name<br/>
        <input type="text" name="l_name"/>
    </p>
    <p>Email<br/>
        <input type="email" name="email"/>
    </p>
    <p>Auth Level<br/>
        <input type="text" name="authl"/>
    </p>
    <p>Password<br/>
        <input type="password" name="password"/>
    </p>
    <p>Confirm Password<br/>
        <input type="password" name="cpassword"/>
    </p>
    <p>
        <input type="submit" name="submit" value="Create Agent"/>
    </p>
</form>
</body>
</html>
@stop
