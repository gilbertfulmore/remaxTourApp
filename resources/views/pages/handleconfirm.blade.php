<!-- This file is part of open-sourced software licensed under the MIT license -->

@extends('app')

@section('title')Realty Tour App @stop

@section('body')
    <?php

    $input = array_flatten($input);
    $prop_id = $input[0];
    $status = 'C';

    DB::update('update listings set status = ? where property_id = ?', [$status, $prop_id]);

    $contentblock = "<div class='contentheader'>Edit Listing</div>
                         <div class='contentblock'><p>Listing confirmed</p></div>";

    ?>
    <?php echo $contentblock; ?>

@stop
