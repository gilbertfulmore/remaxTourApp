<?php
    if(filter_input (INPUT_COOKIE, 'auth') == "1" || "2")
    {
        $loginblock = " ";
    }
    else
    {
        $loginblock = "
                <div id='contentnav'>Login</div>
                <div id='contentblock'>
                    <form method='post' action='login.php'>
                        <div id='loginbox'>
                            User ID: <br/>
                            <input type='text' name='ID' id='formstyle'/>
                        </div>
                        <div id='loginbox'>
                            Password: <br/>
                            <input type='password' name='PASSWORD' id='formstyle'/>
                        </div>
                        <div id='loginbox'>
                            <br/><input type='submit' name='submit' value='login' id='formstyle'/>
                        </div>
                    </form>
                </div>";
    }

    if(filter_input (INPUT_COOKIE, 'auth') == "1" ||  "2")
    {
        $naviblock = ""
                . "<ul>"
                . "<li> <a href='home'>Home</a> </li>"
                . "<li> <a href='mylistings'>My Listings</a> </li>"
                . "<li> <a href='help'>Help</a> </li>"
                . "<li> <a href='logout'>Logout</a> </li>"
                . "</ul>";
    }
    else
    {
        $naviblock = "Please login below.";
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
                list-style-type: none;
                margin: 0px;
                padding: 10px;
                font-size: 1.0em;
                font-variant: small-caps;
            }
            #nav li
            {
                display: inline;
                padding: 10px;
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
                height: 25px;
                background: -webkit-linear-gradient(#6B8FB2, #C4D2E0);
                background: -o-linear-gradient(#6B8FB2, #C4D2E0);
                background: -moz-linear-gradient(#6B8FB2, #C4D2E0);
                background: linear-gradient(#6B8FB2, #C4D2E0);
                text-align: center;
                font-size: 0.8em;
                padding-top: 1px;
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
            <?php echo "$loginblock"; ?>
            @yield('body')
            <div id="nav">
                page footer
            </div>
        </div>
    </body>
</html>
