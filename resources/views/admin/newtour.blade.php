<?php
$tours = DB::select('select * from tours where id > 1');
foreach ($tours as $tour) {
    $p_stat = $tour->id;
}
$counting = DB::select('select * from listings where tour_id = (?)', [$p_stat]);
if (count($counting) < 20) {
    DB::insert('UPDATE listings SET status = "t", tour_id = (?) WHERE property_id = (?)', [$p_stat, $input]);
}