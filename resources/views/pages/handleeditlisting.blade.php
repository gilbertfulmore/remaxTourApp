@extends('app')

@section('title')Realty Tour App @stop

@section('body')
    <?php

        $input = array_flatten($input);

        DB::update('update properties set address = ?, sq_feet = ?, district_code = ? where id = ?', [$input[1], $input[2], $input[4], $input[0]]);

        DB::update('update listings set mls = ? where property_id = ?', [$input[3], $input[0]]);

        $contentblock = "<div class='contentheader'>Edit Listing</div>
                         <div class='contentblock'><p>Listing updated</p></div>";

    ?>
    <?php echo $contentblock; ?>

@stop
