@extends('app')

@section('title')Realty Tour App @stop

@section('body')
<div>
    <h1>Welcome to the RE/MAX site</h1>
    <p>
        <h2>Links</h2>
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
    </p>
</div>
@stop