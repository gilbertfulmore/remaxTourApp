<?php
$input = array_flatten($input);

if($input[0] == 1){
DB::insert('UPDATE listings SET status = "s" WHERE property_id = (?)', [$input[1]]);
}
elseif($input[0] == 2){
DB::insert('UPDATE listings SET status = "r" WHERE property_id = (?)', [$input[1]]);
}
elseif($input[0] == 3){
DB::insert('UPDATE listings SET status = "c", rank = 0 WHERE property_id = (?)', [$input[1]]);
}
