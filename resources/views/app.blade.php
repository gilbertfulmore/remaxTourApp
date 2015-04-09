<?php
    if(Auth::user())
    {
        $naviblock = "  <nav class='clearfix'>
                            <a href='#' id='pull'>Menu</a>
                        <ul class='clearfix'>
                            <li> <a href='/'>Home</a> </li>
                            <li> <a href='submitproperty'>Submit</a> </li>
                            <li> <a href='mylistings'>My Listings</a> </li>
                            <li> <a href='tours'>View Tours</a> </li>
                            <li> <a href='help'>Help</a> </li>
                            <li> <a href='logout'>Logout</a> </li>
                        </ul>
                        </nav>";
    }
    else
    {
        $naviblock = "  <nav class='clearfix'>
                        <a href='#' id='pull'>Menu</a>
                        <ul class='clearfix'>
                            <li> <a href='/'>Home</a> </li>
                            <li> <a href='login'>Login</a> </li>
                        </ul>
                        </nav>";
    }
    if (Auth::user() && Auth::user()->auth_level == 'admin')
    {
        $adminblock = "<div class='contentblock'>
                            <div class='button'><a href='admin'>Admin Panel</a></div>
                        </div>";
    }
    else
    {
        $adminblock = " ";
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script>
            $(function()
            {
                var pull = $('#pull');
                menu = $('nav ul');
                menuHeight = menu.height();

                $(pull).on('click', function(e)
                {
                    e.preventDefault();
                    menu.slideToggle();
                });

                $(window).resize(function()
                {
                    var w = $(window).width();
                    if(w > 320 && menu.is(':hidden'))
                    {
                        menu.removeAttr('style');
                    }
                });
            });
        </script>
        <style>
            @import url('http://fonts.googleapis.com/css?family=Open+Sans+Condensed');
            /* Clearfix */
            .clearfix:before, .clearfix:after
            {
                content: " ";
                display: table;
            }
            .clearfix:after
            {
                clear: both;
            }
            .clearfix
            {
                *zoom: 1;
            }
            body
            {
                font-family: "Open Sans Condensed", sans-serif;
                font-size: 0.9em;
                background-color: #CCCCFF;
            }
            a
            {
                text-decoration: none;
                color: #000000;
            }
            .button a
            {
                text-decoration: none;
                color: #FFFFFF;
            }
            #wrapper
            {
                width: 95%;
                border: 1px solid #6B8FB2;
                margin: auto;
                background-color: #FFFFFF;
                border-radius: 25px 20px 0px 0px;
            }
            #logo
            {
                margin: auto;
                padding: 20px;
            }
            nav
            {
                margin: auto;
                font-size: 1.0em;
                height: 40px;
                width: 100%;
                background-color: #6B8FB2;
                font-weight: bold;
                position: relative;
            }
            nav ul
            {
                padding: 0;
                margin: 0 auto;
                width: 100%;
                height: 40px;
            }
            nav li
            {
                display: inline;
                float: left;
            }
            nav a
            {
                color: #FFFFFF;
                display: inline-block;
                width: 120px;
                text-align: center;
                text-decoration: none;
                line-height: 40px;
            }
            nav a:hover, nav a:active
            {
                background-color: #A6BCD1;
            }
            nav a#pull
            {
                display: none;
            }
            /*Styles for screen 750px and lower*/
            @media screen and (max-width: 750px)
            {
                nav
                {
                    height: auto;
                    background-color: #95A9BC;
                }
                nav ul
                {
                    width: 100%;
                    display: block;
                    height: auto;
                }
                nav li
                {
                    width: 50%;
                    float: left;
                    position: relative;
                }
                nav li a
                {
                    border-bottom: 1px solid #6B8FB2;
                    border-right: 1px solid #6B8FB2;
                }
                nav a
                {
                    text-align: left;
                    width: 100%;
                    text-indent: 25px;
                }
                nav a:hover, nav a:active
                {
                    background-color: #6B8FB2;
                }
            }
            /*Styles for screen 750px and lower*/
            @media only screen and (max-width : 750px)
            {
                nav
                {
                    border-bottom: 0;
                }
                nav ul
                {
                    display: none;
                    height: auto;
                }
                nav a#pull
                {
                    display: block;
                    background-color: #6B8FB2;
                    width: 100%;
                    position: relative;
                }
                nav a#pull:after
                {
                    content:"";
                    width: 0;
                    height: 0;
                    border: 10px solid #FFFFFF;
                    border-radius: 50%;
                    display: inline-block;
                    position: absolute;
                    right: 15px;
                    top: 10px;
                }
            }
            /*Smartphone*/
            @media only screen and (max-width : 320px)
            {
                nav li
                {
                    display: block;
                    float: none;
                    width: 100%;
                }
            }
            .contentblock
            {
                width: 90%;
                margin: 10px auto 20px;
                text-align: justify;
                clear: both;
            }
            .contentheader
            {
                clear:both;
                font-size: 1.3em;
                color: #2E2E2E;
                border-bottom: 1px solid #CCCCCC;
                margin-top: 20px;
                padding-left: 10px;
            }
            .footer
            {
                width: 100%;
                height: 25px;
                margin-top: 30px;
                color: #2E2E2E;
                font-size: 0.9em;
                text-align: center;
                clear: both;
            }
            .button
            {
                clear:both;
                background-color: #6B8FB2;
                border-radius: 10px 25px 10px 10px;
                padding: 10px;
                margin: 10px;
                width: 120px;
                font-weight: bold;
                color: #FFFFFF;
            }
            .button:hover
            {
                background-color: #A6BCD1;
            }
            .formcontainer
            {
                float: left;
                margin: 10px 0px 0px 10px;
                font-size: 0.8em;
                color: #3D3D3D;
            }
            .datatable
            {
                width: 100%;
                margin: 10px;
                border-bottom: 1px solid #CCCCCC;
            }
            .datatable th
            {
                width: 90px;
            }
            .databutton
            {
                width: 100px;
                padding: 2px;
            }
            input, button, select, textarea
            {
                width: 150px;
                border: 1px solid #6B8FB2;
                border-radius: 10px;
                margin: 5px;
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <div id="logo">
                <img src="http://i.imgur.com/FJWo8rZ.png" alt="REMAX"/>
            </div>
            <?php echo "$naviblock"; ?>
            <?php echo "$adminblock"; ?>
            @yield('body')
            <div class='footer'>

            </div>
        </div>
    </body>
</html>
