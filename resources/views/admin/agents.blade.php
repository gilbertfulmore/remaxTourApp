<html>
<head>
    <title>Agents Page</title>
</head>
<body>
<p>
    <h1>These are all the agents currently in the system</h1>
</p>
<?php   // DB is a Laravel API call, See http://laravel.com/docs/5.0/database for more info
        $agents = DB::select('select * from agents');

        foreach ($agents as $agent) {

            echo "<p>";
            echo "Name: ".$agent->f_name." ".$agent->l_name."<br/>";
            echo "Agent ID: ".$agent->id."<br/>";
            echo "Email: ".$agent->email."<br/>";
            echo "Account Type: ".$agent->auth_level."<br/>";
            echo "</p>";
        }
?>
</body>
</html>