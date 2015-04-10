<?php
$input = array_flatten($input);

if($input[0] == 1){
DB::insert('UPDATE listings SET status = "s" WHERE property_id = (?)', [$input[1]]);
}
elseif($input[0] == 2){
DB::insert('UPDATE listings SET status = "r" WHERE property_id = (?)', [$input[1]]);
}
elseif($input[0] == 3){
DB::insert('UPDATE listings SET status = "c", rank = 0, tour_id = 1 WHERE property_id = (?)', [$input[1]]);
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
