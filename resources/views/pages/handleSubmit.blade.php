<!-- This file is part of open-sourced software licensed under the MIT license -->

@extends('app')

@section('title')Realty Tour App @stop

@section('body')
    <?php
        $input = array_flatten($input);

        DB::insert('insert into properties (id, address, sq_feet, district_code) values (?, ?, ?, ?)', [$input[0], $input[1], $input[2], $input[3]]);

        DB::insert('insert into listings (mls, agent_id, created_on, tour_id, property_id, status) values (?, ?, ?, ?, ?, ?)', [$input[4], $input[5], $input[6], $input[7], $input[8], $input[9]]);

        $contentblock = "<div class='contentheader'>Submit New Property</div>
                         <div class='contentblock'><p>Property submitted</p></div>";
    ?>
    <?php echo $contentblock; ?>

@stop
