<?php
    if(Auth::user())
    {
        $naviblock = ""
                . "<ul>"
                . "<li> <a href='/'>Home</a> </li>"
                . "<li> <a href='mylistings'>My Listings</a> </li>"
                . "<li> <a href='submitproperty'>Submit Property</a> </li>"
                . "<li> <a href='help'>Help</a> </li>"
                . "<li> <a href='logout'>Logout</a> </li>"
                . "</ul>";
    }
    else
    {
        $naviblock = ""
                . "<ul>"
                . "<li> <a href='/'>Home</a> </li>"
                . "<li> <a href='login'>Login</a> </li>"
                . "</ul>";
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <style>
            body
            {
                font-family: Verdana, Geneva, sans-serif;
                letter-spacing: 3px;
                font-size: 0.9em;
                background-color: #CCCCFF;
            }
            thead
            {
                background-color: #6B8FB2;
                margin: 5px;
            }
            tbody
            {
                background-color: #CCCCFF;
                margin: 5px;
            }
            td
            {
                padding: 5px;
            }
            ol
            {
                list-style-type: none;
            }
            #nav ul
            {
                font-size: 1.0em;
                font-variant: small-caps;
            }
            #nav li
            {
                display: inline;
                margin-right: 20px;
            }
            #block
            {
                width: 90%;
                border: 1px solid #6B8FB2;
                margin: auto;
                background: #FFFFFF;
                border-radius: 25px 20px 0px 0px;
            }
            #logo
            {
                margin: auto;
                padding: 20px;
            }
            #nav
            {
                width: 100%;
                margin: auto;
                height: 30px;
                padding-top: 5px;
                background: -webkit-linear-gradient(#6B8FB2, #C4D2E0);
                background: -o-linear-gradient(#6B8FB2, #C4D2E0);
                background: -moz-linear-gradient(#6B8FB2, #C4D2E0);
                background: linear-gradient(#6B8FB2, #C4D2E0);
                text-align: center;
                font-size: 0.8em;
                color: #FFFFFF;
                clear: both;
            }
            #nav a
            {
                color: #FFFFFF;
                font-variant: small-caps;
                word-spacing: 20px;
                text-decoration: none;
            }
            #contentblock
            {
                width: 90%;
                margin: auto;
                text-align: justify;
            }
            #contentnav
            {
                width: 100%;
                height: 25px;
                margin-top: 10px;
                background: -webkit-linear-gradient(#6B8FB2, #C4D2E0);
                background: -o-linear-gradient(#6B8FB2, #C4D2E0);
                background: -moz-linear-gradient(#6B8FB2, #C4D2E0);
                background: linear-gradient(#6B8FB2, #C4D2E0);
                padding-top: 5px;
                text-indent: 20px;
                font-weight: bold;
                color: #FFFFFF;
                clear: both;
                font-size: 0.9em;
            }
            #loginbox
            {
                position: relative;
                float: left;
                margin: 0px 10px 10px;
            }
            #formstyle
            {
                background-color : #FFFFFF;
                border: 1px solid #6B8FB2;
                width: 200px;
            }
            #tourTable
            {
                margin: 10px;
            }
            #helpcontent
            {
                margin-left: 20px;
            }
            #subhelp
            {
                margin-left: 20px;
            }
        </style>
    </head>
    <body>
        <div id="block">
            <div id="logo">
                <img src="http://i.imgur.com/FJWo8rZ.png" alt="REMAX"/>
            </div>
            <div id="nav">
                <?php echo "$naviblock"; ?>
            </div>
            @yield('body')
            <div id="nav">
                page footer
            </div>
        </div>
    </body>
</html>
