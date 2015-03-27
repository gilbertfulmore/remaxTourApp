@extends('app')

@section('title')Realty Tour App @stop

@section('body')
<html>
<head>
    <title>Admin Page</title>
</head>
<body>
<p>
<h1>This is the admin's Home Page</h1>
</p>
<p>
<h2>Links</h2><br/>
<ul>
    <li>
        <a href="admin/agents">View Agents</a>
    </li>
    <li>
        <a href="admin/register">Register Agent</a>
    </li>
    <li>
        <a href="admin/edittours">Edit Tours</a>
    </li>
    <li>
        <a href="admin/edituser">Edit Users</a>
    </li>
</ul>
</p>
</body>
</html>
@stop