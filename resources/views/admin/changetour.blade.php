@extends('app')

@section('title')Realty Tour App @stop

@section('body')
<?php
$input = array_flatten($input);

    $con = "<div class='contentheader'>Submit New Property</div>"
    ."<div class='contentblock'>"
            ."<p>"
        ."<form method='post' action='submit'>"
        ."<input type='hidden' name='_token' value='".csrf_token()."'>"
        ."<input type='hidden' name='agent_id' value='".$input[0]."'>"
        ."<input type='hidden' name='tour_id' value='".$input[1]."'>"
        ."<input type='hidden' name='status' value='".$input[2]."'>"
            ."<div class='formcontainer'>Property ID: <br/>"
            ."<input type='number' name='sub_ID'/>"
            ."</div>"
            ."<div class='formcontainer'>Address: <br/>"
            ."<input type='text' name='sub_add'/>"
            ."</div>"
            ."<div class='formcontainer'>MLS: <br/>"
            ."<input type='text' name='sub_mls'/>"
            ."</div>"
            ."<div class='formcontainer'>Square Footage: <br/>"
            ."<input type='text' name='sub_sqr'/>"
            ."</div>"
            ."<div class='formcontainer'>Sub-area: <br/>"
            ."<select name='sub_dist'>"
                    ."<option value='LCU'>Winfield, Ellison, Lake Country, Quail</option>"
                    ."<option value='KNG'>Dilworth, Glenmore, North Glenmore, Kelowna North</option>"
                    ."<option value='KSM'>Springfield, Spall, Mission, Southeast Kelowna, Kelowna South</option>"
                    ."<option value='WK'>Westside</option>"
                    ."<option value='RNS'>Rutland, Black Mountain, Joe Rich</option>"
                ."</select>"
            ."</div>"
            ."<div style='clear:both; margin: 10px;'><input type='submit' name='submit_prop' value='Submit'/></div>"
        ."</form>"
        ."</p>"
    ."</div>";

echo "$con";
?>


@stop
