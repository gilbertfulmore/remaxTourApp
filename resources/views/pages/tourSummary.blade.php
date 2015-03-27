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
use Illuminate\Support\Facades\Auth;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $agent_id = Auth::user()->id;
    $data = array();

    $listings = DB::select('SELECT mls FROM listings WHERE agent_id = ?',
        [$agent_id]);

    $estimates = DB::select('SELECT e.price, e.mls
                                         FROM estimates e, listings l
                                         WHERE l.tour_id = ? AND
                                         l.agent_id = ? AND
                                         e.mls = l.mls', [$agent_id, $_POST['tour_id']]);
    $totals = array();

    foreach ($estimates as $estimate) {

        $totals += array($estimate->mls, $estimate->price);
    }

    echo "<table><tr>";
    echo "<th>MLS</th>";
    echo "<th>Price Average</th>";
    echo "<th>Price Max</th></tr>";

    foreach ($listings as $listing) {

        echo "<tr>";
        echo "<td>".$listing->mls."</td>";
        echo "";
        echo "</tr>";
    }

    echo "</table>";
}
?>
@stop