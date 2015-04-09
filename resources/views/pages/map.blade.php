<!-- This file is part of open-sourced software licensed under the MIT license -->

<?php
$address = array_flatten($input);
$address = $address[0];
/**
 * Property tour locator using Google Maps
 * -Retrieves an array of addresses from mysql - remax.PROPERTIES
 *  then plots all the addresses into google map.
 *
 * version 2015-03-20 - Gilbert Fulmore
 */
function loadMap($address) {
    $city     = 'Kelowna';
    $province = 'British Columbia';
    $address  = $address . ', ' . $city . ', ' . $province; //google search query
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
    print '
    <!DOCTYPE html>
    <html>
        <head>
            <style type="text/css">
                html, body, #map-canvas {
                    height: 100%;
                    margin: 0;
                    padding: 0;
                }
            </style>
            <script type="text/javascript"
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5USCT0N49K5cTOF0mh66IPN73JZqvILs">
            </script>
            <script type="text/javascript">
                function initialize() {
                    var property = '.json_encode($property).';
                    var mapOptions = {
                        center: {
                            lat: property[1],
                            lng: property[2]
                        },
                        zoom: 15
                    };
                    var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
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
            </script>
        </head>
        <body>
            <div id="map-canvas"></div>
        </body>
    </html>
    ';
}
loadMap($address);
