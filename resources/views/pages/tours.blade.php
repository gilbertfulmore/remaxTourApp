<!-- This file is part of open-sourced software licensed under the MIT license -->

@extends('app')

@section('title')Realty Tour App @stop

@section('body')

    <?php
    $listings = DB::select('select * from listings L, properties P where L.property_id = P.id and tour_id = ?', [1]);
    echo "<div class='contentheader'>Current Tour</div><div class='contentblock'>";
    if (count($listings) < 1) {
        echo "There are no tours";
    } else {

        foreach ($listings as $listing) {
            echo "<table class='datatable'>
                    <tr>
                        <th>Address:</th>
                        <td width='100%'> " . $listing->address . "</td>
                        <td rowspan='2'>
                            <form method='post' action='map'>
                                <input type='hidden' name='_token' value='" . csrf_token() . "'>
                                <input type='hidden' name='prop_add' value='" . $listing->address . "'>
                                <input type='submit' name='p_conf' value='View' class='databutton'/>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <th>MLS: </th>
                        <td>" . $listing->mls . "</td>
                    </tr>
                </table>";
        }

    }
    echo "</div>";
    ?>
@stop
