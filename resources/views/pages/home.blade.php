@extends('app')

@section('title')Realty Tour App @stop

@section('body')
    <div class="contentheader">Welcome</div>
    <div class="contentblock">
        <ul>
            <li>
                <a href="login">Login</a>
            </li>
            <li>
                <a href="logout">Logout</a>
            </li>
            <li>
                <a href="admin">Admin Page</a>
            </li>
            <li>
                <a href="help">Help Page</a>
            </li>
            <li>
                <a href="shadow">Agent Authorization test page (shadow)</a>
            </li>
            <li>
                <a href="tours">View Tours</a>
            </li>
            <li>
                <a href="map">Map</a>
            </li>
            <li>
                <a href="toursummary">Tours Summary</a>
            </li>
        </ul>
    </div>
@stop
