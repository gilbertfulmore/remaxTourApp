<!-- This file is part of open-sourced software licensed under the MIT license -->

@extends('app')

@section('title')Realty Tour App @stop

@section('body')
    <?php

    $listings = DB::select('select * from listings L, properties P where L.property_id = P.id and L.property_id = ?', [$prop_id]);

    echo "<div class='contentheader'>View Property</div>
                <div class='contentblock'>";
    foreach ($listings as $listings)
    {
        echo "<table class='datatable'>";
        echo "<tr><th>MLS:</th><td>".$listings->mls."</td></tr>
                <tr><th>Address:</th><td>".$listings->address."</td></tr>
                <tr><th>Square Feet:</th><td>".$listings->sq_feet."</td></tr>
                <tr><th>Area:</th><td>".$listings->district_code."</td></tr>";
        echo "</table>";
    }
    echo "</div>";
    echo "<div class='contentheader'>Edit Property</div><div class='contentblock'>";
    echo "<form method='post' action='edit_listing'>
            <input type='hidden' name='_token' value='".csrf_token()."'>
            <input type='hidden' name='prop_id' value='".$prop_id."'>
            <p>MLS: <br/><input type='text' name='prop_mls' value='".$listings->mls."'/></p>
            <p>Address: <br/><input type='text' name='prop_add' value='".$listings->address."'/></p>
            <p>Square Feet: <br/><input type='number' name='prop_sq' value='".$listings->sq_feet."'/></p>
            <p>Area: <br/><select name='prop_dist'>
                <option value='LCU'>Winfield, Ellison, Lake Country, Quail</option>
                <option value='KNG'>Dilworth, Glenmore, North Glenmore, Kelowna North</option>
                <option value='KSM'>Springfield, Spall, Mission, Southeast Kelowna, Kelowna South</option>
                <option value='WK'>Westside</option>
                <option value='RNS'>Rutland, Black Mountain, Joe Rich</option>
            </select></p>
            <p><input type='submit' name='p_save' value='Save Changes'/></p>
            </form></div>";



?>

@stop
