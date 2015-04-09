<!-- This file is part of open-sourced software licensed under the MIT license -->

@extends('app')

@section('title')Realty Tour App @stop

@section('body')
<div class="contentheader">Admin Page</div>
<div class="contentblock">
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
</div>
@stop
