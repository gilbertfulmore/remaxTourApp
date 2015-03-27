@extends('app')

@section('title')Realty Tour App @stop

@section('body')
    <?php
        $agent_id;
        $status;

        $listings = DB::select('select * from listings L, properties P where L.property_id = P.id and L.agent_id = ?', [$agent_id]);
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

        $searchblock = "<div id='contentnav'>Search</div><div id='contentblock'>";
        $searchblock .= "<p>MLS: <form method='post' action='search_mls'>
                            <input type='hidden' name='_token' value='".csrf_token()."'>
                            <p><input type='number' name='s_mls'/></p>
                            <p><input type='submit' name='src' value='Search'/></p>
                            </form></p>";
        $searchblock .= "<p>Address: <form method='post' action='search_add'>
                            <input type='hidden' name='_token' value='".csrf_token()."'>
                            <p><input type='text' name='s_add'/></p>
                            <p><input type='submit' name='src' value='Search'/></p>
                            </form></p>";
        $searchblock .= "</div>";

    ?>

    <?php echo "$contentblock"; ?>
    <?php echo "$searchblock"; ?>

@stop
