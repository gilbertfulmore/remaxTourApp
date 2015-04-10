@extends('app')

@section('title')Realty Tour App @stop

@section('body')

    <?php
    $prop_arr = array();
    $count = 0;
    $listings = DB::select('select * from listings where status = "t" and tour_id > 1 order by rank');
    $contentblock = "";
    $mcount = count($listings);
    $mcount++;
    if (count($listings) < 1) {
        echo "There are no tours";
    }
    else
    {
        $contentblock = "<div id='contentnav'>Organize Properties</div>"
                . "<div id='contentblock'>"
                . "<table id='tourTable'><thead><tr><th>Agent ID</th><th>MLS</th><th>Property ID</th><th>Status</th><th>Rank</th><th>Modify</th></tr></thead><tbody>";
        foreach ($listings as $listing) {
            $p_stat = $listing->status;
            if($p_stat == 't'){
                $p_edit = "<form method='post' action='reorganize'>"
                        ."<input type='hidden' name='_token' value='".csrf_token()."'>"
                        ."<input type='hidden' name='property_id' value='".$listing->property_id."'>"
                        ."<input type='hidden' name='rank' value='".$listing->rank."'>"
                        ."<select name='res' id='formstyle'";
                while ($mcount > 0) {
                    $p_edit .= "<option value='$mcount'>$mcount</option>";
                    $mcount--;
                    }
                $p_edit .= "<input type='submit' name='submit' value='reorganize' id='formstyle'/>"
                        ."</select></form>";
                $mcount = count($listings);
                $mcount++;
            }
            switch($p_stat)
            {
                case 't':
                    $p_stat = "On Tour";
                    break;
            }
            $contentblock = $contentblock."<tr><td>".$listing->agent_id."</td><td>".$listing->mls."</td><td>".$listing->property_id."</td><td>".$p_stat."</td><td>".$listing->rank."</td><td>".$p_edit."</td></tr>";
            $count++;
        }
        $contentblock = $contentblock."</tbody></table>"
                . "</div>";
    }
    echo "$contentblock";
    ?>
@stop
