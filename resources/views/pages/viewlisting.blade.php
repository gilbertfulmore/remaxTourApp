@extends('app')

@section('title')Realty Tour App @stop

@section('body')
    <?php
        $prop_id = array_flatten($prop_id);
        $prop_id = $prop_id[0];

        $listings = DB::select('select * from listings L, properties P where L.property_id = P.id and L.property_id = ?', [$prop_id]);
        $contentblock = "<div id='contentnav'>Edit Property</div><div id='contentblock'>";
        $contentblock .= "<form method='post' action='editlisting'>
                            <input type='hidden' name='_token' value='".csrf_token()."'>
                            <input type='hidden' name='p_id' value='".$prop_id."'>";
        $contentblock .= "<table id='tourTable'><thead><tr><th>MLS</th><th>Address</th><th>Area (sq feet)</th><th>Sub Area</th></tr></thead><tbody>";

        foreach ($listings as $listings)
        {
            $contentblock .= "<tr>";
            $contentblock .= "<td>".$listings->mls."</td>";
            $contentblock .= "<td>".$listings->address."</td>";
            $contentblock .= "<td>".$listings->sq_feet."</td>";
            $contentblock .= "<td>".$listings->district_code."</td>";
            $contentblock .= "</tr>";
        }
        $contentblock .= "<tr>";
        $contentblock .= "<td><input type='text' name='p_mls' id='formstyle' value='".$listings->mls."'/></td>";
        $contentblock .= "<td><input type='text' name='p_add' id='formstyle' value='".$listings->address."'/></td>";
        $contentblock .= "<td><input type='number' name='p_sq' id='formstyle' value='".$listings->sq_feet."'/></td>";
        $contentblock .= "<td><select name='p_dist' id='formstyle'>
                             <option value='BW'>Big White</option>
                             <option value='BL'>Black Mountain</option>
                             <option value='BE'>Beaverdell-Carmi</option>
                          </select></td>";
        $contentblock .= "</tr>";

        $contentblock .= "</tbody></table>";
        $contentblock .= "<p><input type='submit' name='p_save' value='Save Changes' id='formstyle'/></p>";
        $contentblock .= "</form></div>";


    ?>

    <?php echo "$contentblock"; ?>

@stop
