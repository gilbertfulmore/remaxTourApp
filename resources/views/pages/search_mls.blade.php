@extends('app')

@section('title')Realty Tour App @stop

@section('body')

    <?php
    $input = array_flatten($input);
    $agent_id = $input[0];
    $mls = $input[1];


    $listings = DB::select('select * from listings L, properties P where L.property_id = P.id and L.agent_id = ? and L.mls like ?', [$agent_id, '%'.$mls.'%']);
    $contentblock = "<div id='contentnav'>Your Properties</div><div id='contentblock'>";
    $contentblock .= "<table id='tourTable'><thead><tr><th>MLS</th><th>Address</th><th>District</th><th>Status</th><th>Modify</th><th>Confirm Property</th></tr></thead><tbody>";

    foreach ($listings as $listings)
    {
        $contentblock .= "<tr>";
        $contentblock .= "<td>".$listings->mls."</td>";
        $contentblock .= "<td>".$listings->address."</td>";
        $contentblock .= "<td>".$listings->district_code."</td>";

        $status = $listings->status;
        switch($status)
        {
            case 'S':
                $status = "Submitted";
                break;
            case 'C':
                $status = "Confirmed";
                break;
            case 'R':
                $status = "Removed";
                break;
            case 'T':
                $status = "On Tour";
                break;
        }
        if($listings->status == 'S')
        {
            $edit = "<form method='post' action='viewlisting'>
                <input type='hidden' name='_token' value='".csrf_token()."'>
                <input type='hidden' name='prop_id' value='".$listings->property_id."'>
                <input type='submit' name='p_edit' value='Edit'/></form>";
            $confirm = "<form method='post' action='confirm'>
                <input type='hidden' name='_token' value='".csrf_token()."'>
                <input type='hidden' name='prop_id' value='".$listings->property_id."'>
                <input type='submit' name='p_conf' value='Confirm'/></form>";
        }
        else
        {
            $edit = "";
            $confirm = "";
        }
        $contentblock .= "<td>".$status."</td>";
        $contentblock .= "<td>".$edit."</td>";
        $contentblock .= "<td>".$confirm."</td>";
        $contentblock .= "</tr>";
    }
    $contentblock .= "</tbody></table>";
    $contentblock .= "<p>Note: by confirming a property, you will no longer be able to make any changes.</p>";
    $contentblock .= "<p>If any changes need to be made to a confirmed property, please contact the office administrator.</p></div>";

    ?>

    <?php echo $contentblock; ?>

@stop
