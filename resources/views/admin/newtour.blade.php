<?php
$tours = DB::select('select * from tours where id > 1');
foreach ($tours as $tour) {
    $p_stat = $tour->id;
}

$counting = DB::select('select * from listings where tour_id = (?)', [$p_stat]);
$counter = DB::select('select * from listings where status = (?)', ['t']);
$rankcount = count($counter) + 1;

if (count($counting) < 20) {
    DB::insert('UPDATE listings SET status = "t", tour_id = (?), rank = (?) WHERE property_id = (?)', [$p_stat, $rankcount, $input]);
}

?>
<!-- This file is part of open-sourced software licensed under the MIT license -->

@extends('app')

@section('title')Realty Tour App @stop

@section('body')
    <div class="contentheader">Changes Submitted</div>
    <div class="contentblock">
        <ul>
            <li>
                <a href="../admin/edittours">Return to Edit Tours</a>
            </li>
        </ul>
    </div>
@stop
