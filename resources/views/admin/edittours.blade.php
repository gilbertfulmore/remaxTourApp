<!-- This file is part of open-sourced software licensed under the MIT license -->

@extends('app')

@section('title')Realty Tour App @stop

@section('body')

<?php
$prop_arr = array();
$count = 0;
$listings = DB::select('select * from listings where status = "c" or status = "t"');
$p_edit = "";
$p_conf = "";
$p_remt = "";
$p_sum = "";
if (count($listings) < 1) {
    echo "There are no tours";
}
else
{
    $contentblock = "<div id='contentnav'>Confirmed Properties</div>"
        . "<div id='contentblock'>"
        . "<table id='tourTable'><thead><tr><th>Agent ID</th><th>MLS</th><th>Property ID</th><th>Status</th><th>Modify</th><th>Confirm Property</th><th>Remove Property</th><th>Downgrade Property</th></tr></thead><tbody>";
    foreach ($listings as $listing) {
        $p_stat = $listing->status;
        if($p_stat == 'c')
        {
            $p_edit = "<form method='post' action='changetour'>"
                    ."<input type='hidden' name='_token' value='".csrf_token()."'>"
                    ."<input type='hidden' name='agent_id' value='".$listing->agent_id."'>"
                    ."<input type='hidden' name='tour_id' value='".$listing->tour_id."'>"
                    ."<input type='hidden' name='status' value='".$listing->status."'>"
                    ."<input type='submit' name='p_confirm' value='Edit' id='formstyle'/></form>";
            $p_conf = "<form method='post' action='newtour'>"
                ."<input type='hidden' name='_token' value='".csrf_token()."'>"
                ."<input type='hidden' name='property_id' value='".$listing->property_id."'>"
                ."<input type='submit' name='p_confirm' value='Add to tour' id='formstyle'/></form>";
            $p_remt = "<form method='post' action='markremove'>"
                ."<input type='hidden' name='_token' value='".csrf_token()."'>"
                ."<input type='hidden' name='property_id' value='".$listing->property_id."'>"
                ."<input type='submit' name='p_confirm' value='Mark As Removed' id='formstyle'/></form>";
            $p_sum = "<form method='post' action='marksubmit'>"
                ."<input type='hidden' name='_token' value='".csrf_token()."'>"
                ."<input type='hidden' name='property_id' value='".$listing->property_id."'>"
                ."<input type='submit' name='p_confirm' value='Downgrade' id='formstyle'/></form>";
        }
        elseif($p_stat == 't'){
            $p_edit = "<form method='post' action='changetour'>"
                    ."<input type='hidden' name='_token' value='".csrf_token()."'>"
                    ."<input type='hidden' name='agent_id' value='".$listing->agent_id."'>"
                    ."<input type='hidden' name='tour_id' value='".$listing->tour_id."'>"
                    ."<input type='hidden' name='status' value='".$listing->status."'>"
                    ."<input type='submit' name='p_confirm' value='Edit' id='formstyle'/></form>";
            $p_conf = "<form method='post' action='removetour'>"
                ."<input type='hidden' name='_token' value='".csrf_token()."'>"
                ."<input type='hidden' name='property_id' value='".$listing->property_id."'>"
                ."<input type='submit' name='p_confirm' value='Remove from tour' id='formstyle'/></form>";
            $p_remt = "";
            $p_sum = "";
        }
        switch($p_stat)
        {
            case 's':
                $p_stat = "Submitted";
                break;
            case 'c':
                $p_stat = "Confirmed";
                break;
            case 'r':
                $p_stat = "Removed";
                break;
            case 't':
                $p_stat = "On Tour";
                break;
        }
        $contentblock = $contentblock."<tr><td>".$listing->agent_id."</td><td>".$listing->mls."</td><td>".$listing->property_id."</td><td>".$p_stat."</td><td>".$p_edit."</td><td>".$p_conf."</td><td>".$p_remt."</td><td>".$p_sum."</td></tr>";
        $count++;
    }
    $contentblock = $contentblock."</tbody></table>"
        . "<p>Note: by confirming a property, you will no longer be able to make any changes.</p>"
        . "<p>If any changes need to be made to a confirmed property, please contact the office administrator.</p>"
        . "</div>";
}
echo "$contentblock";
?>
@stop
