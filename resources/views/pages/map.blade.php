@extends('app')
@section('title')Map Page
@stop

<?php
$address = array_flatten($input);
$addressIn = $address[0];
/**
 * Property tour locator using Google Maps
 * -Retrieves an array of addresses from mysql - remax.PROPERTIES
 *  then plots all the addresses into google map.
 *
 * version 2015-03-20 - Gilbert Fulmore
 */
    $city     = 'Kelowna';
    $province = 'British Columbia';
    $address  = $addressIn . ', ' . $city . ', ' . $province; //google search query
    $address  = str_replace(' ', '+', $address);
    $link = array(
        'https://maps.googleapis.com/maps/api/geocode/json?address=',
        $address,
        ',+CA&key=',
        'AIzaSyC5USCT0N49K5cTOF0mh66IPN73JZqvILs'   //api key
    );
    $url = $link[0] . $link[1] . $link[2] . $link[3];
    $json = json_decode(file_get_contents($url), true); //converts json from url to array
    $property = [
        $json['results'][0]['formatted_address'],
        $json['results'][0]['geometry']['location']['lat'],
        $json['results'][0]['geometry']['location']['lng']
    ];

?>

@section('head')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5USCT0N49K5cTOF0mh66IPN73JZqvILs">
    </script>
@stop
@section('javascript')
    function initialize() {
        var property = <?php echo json_encode($property) ?>;
        var mapOptions = {
            center: {
                lat: property[1],
                lng: property[2]
            },
        zoom: 15
        };
        var map = new google.maps.Map(document.getElementById("map-canvis"), mapOptions);
        var infowindow = new google.maps.InfoWindow();
        var marker;
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(property[1], property[2]),
            map: map
        });
        marker.setMap(map);
        google.maps.event.addListener(marker, "click",(
            function (marker) {
                return function () {
                infowindow.setContent(property[0]);
                infowindow.open(map, marker);
            }
        }
        ) (marker) );
    }
    google.maps.event.addDomListener(window, "load", initialize);
@stop

@section('body')
    <div id='map-canvis' style='width: 100%; min-height: 100px; max-height: 500px;'></div>
@stop
