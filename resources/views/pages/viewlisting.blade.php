@extends('app')

@section('title')Realty Tour App @stop

@section('body')
    <?php

    $listings = DB::select('select * from listings L, properties P where L.property_id = P.id and L.property_id = ?', [$prop_id]);

    echo "<div class='contentheader'>View Property</div><div class='contentblock'>";

    foreach ($listings as $listings) {
        echo "<div class='datacontainer'>
                        <div class='datahead'>MLS:</div>
                        <div class='databody'>" . $listings->mls . "</div>
                        <div class='datahead'>Address:</div>
                        <div class='databody'>" . $listings->address . "</div>
                        <div class='datahead'>Square Ft:</div>
                        <div class='databody'>" . $listings->sq_feet . "</div>
                        <div class='datahead'>Area:</div>
                        <div class='databody'>" . $listings->district_code . "</div>
                    </div>";
    }
    echo "</div>";

    echo "<div class='contentheader'>Edit Property</div>
    <div class='contentblock'>
        <form method='POST' action='edit_listing'>
            <input type='hidden' name='_token' value='".csrf_token()."'>
            <input type='hidden' name='prop_id' value='".$prop_id."'>
            <label>MLS: <input type='text' name='prop_mls' value='".$listings->mls."'></label><br/>
            <label>Address: <input type='text' name='prop_add' value='".$listings->address."'></label><br/>
            <label>Square feet: <input type='number' name='prop_sq' value='".$listings->sq_feet."'></label><br/>
            <label>Sub-area: <select name='prop_dist'>
                <option value='LCU'>Winfield, Ellison, Lake Country, Quail</option>
                <option value='KNG'>Dilworth, Glenmore, North Glenmore, Kelowna North</option>
                <option value='KSM'>Sprintfield, Spall, Mission, Southeast Kelowna, Kelowna South</option>
                <option value='WK'>Westside</option>
                <option value='RNS'>Rutland, Black Mountain, Joe Rich</option>
            </select></label>

            <p><input type='submit' name='p_save' value='Save Changes' id='formstyle'/></p>
        </form>
    </div>";
    ?>


@stop
