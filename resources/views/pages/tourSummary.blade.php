@extends('app')

@section('body')
<h1>Tour Summary Page</h1>

<p>

<h3>Enter a Tour ID below</h3>
</p>
<form action="" method = "POST">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    Tour ID: <input type="number" name="tour_id">
    <input type="submit" name="submit" value="View Tour">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $agent_id = 1;
    $totals = array();
    $estCount = array();
    $maxes = array();

    $estimates = DB::select('SELECT e.price, e.mls
                             FROM estimates e, listings l
                             WHERE l.tour_id = ? AND
                             l.agent_id = ? AND
                             e.mls = l.mls', [$agent_id, $_POST['tour_id']]);

    // Initialize all mls indexes
    foreach ($estimates as $estimate) {

        $estCount[$estimate->mls] = 0;
        $totals[$estimate->mls] = 0;
        $maxes[$estimate->mls] = 0;
    }

    // Tally all prices, calculates the max price entered.
    foreach ($estimates as $estimate) {

        $totals[$estimate->mls] += $estimate->price;
        $estCount[$estimate->mls] += 1;

        if ($estimate->price > $maxes[$estimate->mls]) {

            $maxes[$estimate->mls] = $estimate->price;
        }
    }

    // Table Header
    echo "<table id='tourTable'><tr>";
    echo "<th>MLS</th>";
    echo "<th>Average Estimate</th>";
    echo "<th>Highest Estimate</th></tr>";

    $mlsUnique = array();

    foreach ($estimates as $estimate) {

        // Ensures all MLS numbers are only displayed once
        if (!in_array($estimate->mls, $mlsUnique)) {

            echo "<tr>";
            echo "<td>".$estimate->mls."</td>";
            echo "<td>".$totals[$estimate->mls] / $estCount[$estimate->mls]."</td>";
            echo "<td>".$maxes[$estimate->mls]."</td>";
            echo "</tr>";
        }

        array_push($mlsUnique, $estimate->mls);
    }

    echo "</table>";
}
?>
@stop