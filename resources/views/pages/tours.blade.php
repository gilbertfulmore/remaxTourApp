@extends('app')

@section('title')Realty Tour App @stop

@section('body')

<?php
$listings = DB::select('select * from listings L, properties P where L.property_id = P.id and tour_id = ?', [1]);
$contentblock = "<div id='contentnav'>Current Tour</div><div id='contentblock'>";
if (count($listings) < 1) {
    $contentblock .= "There are no tours";
}
else {
    $contentblock .= "<table id='tourTable'><thead><tr><th>MLS</th><th>Agent Id</th><th>Map</th></tr></thead><tbody>";
    foreach ($listings as $listing) {
        $contentblock .= "<tr>";
        $contentblock .= "<td>".$listing->mls."</td>";
        $contentblock .= "<td>".$listing->address."</td>";
        $contentblock .= "<td> <form method='post' action='map'>
                            <input type='hidden' name='_token' value='".csrf_token()."'>
                            <input type='hidden' name='prop_id' value='".$listing->address."'>
                            <input type='submit' name='p_conf' value='View'/></form> </td>";
        $contentblock .= "</tr>";
    }
    $contentblock .= "</tbody></table>";
}
$contentblock .= "</div>";
?>
<?php echo $contentblock; ?>
@stop