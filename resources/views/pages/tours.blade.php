@extends('app')
@section('title')Help Page
@stop
@section('body')
<html>
<head>
    <title>Tours Page</title>
</head>
<body>
<p>
    <h1>These are all listings in for tour 2</h1>
</p>
<p>
    <?php
    $listings = DB::select('select * from listings where tour_id = ?', [1]);

    if (count($listings) < 1) {
        echo "There are no tours";
    }
    else {
        foreach ($listings as $listing) {

            echo "<p>";
            echo "<h4>MLS: ".$listing->mls."</h4>";
            echo "<h5>Created by Agent #".$listing->agent_id."</h5>";
            echo "<h5>Created on ".$listing->created_on."</h5>";
            echo "<h5>Status: ".$listing->status."</h5>";
            echo "<h5>Tour ID: ".$listing->tour_id."</h5>";
            echo "</p><br/>";
        }
    }
    ?>
</p>
</body>
</html>
@stop