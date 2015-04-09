<!-- This file is part of open-sourced software licensed under the MIT license -->

@extends('app')

@section('title')Realty Tour App @stop

@section('body')

    <?php
    $input = array_flatten($input);
    $agent_id = $input[0];
    $mls = $input[1];

    $listings = DB::select('select * from listings L, properties P where L.property_id = P.id and L.agent_id = ? and L.mls like ?', [$agent_id, '%'.$mls.'%']);
    echo "<div class='contentheader'>Your Properties</div>
                <div class='contentblock'>";

    foreach ($listings as $listings)
    {
        echo "<table class='datatable'>";
        echo "<tr><th>MLS:</th><td>".$listings->mls."</td></tr>
                <tr><th>Address:</th><td>".$listings->address."</td></tr>
                <tr><th>Area:</th><td>".$listings->district_code."</td></tr>";

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
            $edit = "<form method='post' action='view_listing'>
                            <input type='hidden' name='_token' value='".csrf_token()."'>
                            <input type='hidden' name='prop_id' value='".$listings->property_id."'>
                            <input type='submit' name='p_edit' value='Edit' style='width: 80px;'/></form>";
            $confirm = "<form method='post' action='confirm'>
                            <input type='hidden' name='_token' value='".csrf_token()."'>
                            <input type='hidden' name='prop_id' value='".$listings->property_id."'>
                            <input type='submit' name='p_conf' value='Confirm' style='width: 80px;'/></form>";
        }
        else
        {
            $edit = "";
            $confirm = "";
        }
        echo "<tr><th>Status:</th><td>".$status."</td></tr>
                <tr><td>".$edit."</td><td>".$confirm."</td></tr>";
        echo "</table>";
    }
    echo "
                <div style='clear:both;'>Note: by confirming a property, you will no longer be able to make any changes.<br/>
                If any changes need to be made to a confirmed property, please contact the office administrator.</div>
            </div>";

    echo "<div class='contentheader'>Search</div>
                        <div class='contentblock'>
                            <div class='formcontainer'>
                                MLS:
                                <form method='post' action='search_mls'>
                                    <input type='hidden' name='_token' value='".csrf_token()."'>
                                    <p><input type='text' name='s_mls'/></p>
                                    <p><input type='submit' name='src' value='Search'/></p>
                                </form>
                                </div>
                            <div class='formcontainer'>
                                Address:
                                <form method='post' action='search_add'>
                                    <input type='hidden' name='_token' value='".csrf_token()."'>
                                    <p><input type='text' name='s_add'/></p>
                                    <p><input type='submit' name='src' value='Search'/></p>
                                </form>
                            </div>
                        </div>";
    ?>

@stop
