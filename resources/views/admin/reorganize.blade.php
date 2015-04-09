@extends('app')

@section('title')Realty Tour App @stop

@section('body')
    <?php
    $input = array_flatten($input);
    $replace = DB::select('select * from listings where rank = (?)', [$input[1]]);

    if (count($replace) == 0){
    DB::insert('update listings set rank = (?) where property_id = (?)', [$input[1], $input[0]]);
    }
            elseif(count($replace) > 0){
                DB::update('update listings set rank = (?) where rank = (?)', [$input[2], $input[1]]);

                DB::update('update listings set rank = (?) where property_id = (?)', [$input[1], $input[0]]);
            }
    $contentblock = "<div id='contentnav'>Submit New Property</div>
                         <div id='contentblock'><p>Property submitted</p></div>";
    ?>
    <?php echo $contentblock; ?>

@stop
