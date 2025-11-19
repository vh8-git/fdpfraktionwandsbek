<?php
function contactHeader() {
   
    $time = intval(date('H'));

    //http://www.earthtools.org/webservices.htm mit ajax
    //Tag
    if ($time >= 7 && $time <= 23) {
        return '<div id="googleMap" class="stageBackground stageBackground_day"></div>

                        <script>
                            function myMap() {
                                var myLatlng = new google.maps.LatLng(53.70816,9.97925);
                                var mapOptions = {
                                  zoom: 10,
                                  center: myLatlng,
                                };
                                var map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);
                                var image = {url: \'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png\',
                                      size: new google.maps.Size(20, 32),
                                      origin: new google.maps.Point(0, 0),
                                      anchor: new google.maps.Point(0, 32),
                                    };
                                var marker = new google.maps.Marker({
                                    position: myLatlng,
                                    map: map,
                                    icon: image,
                                });
                                map.panBy(-200, -50);
                                marker.setMap(map);
                            };                  
                        </script>
 
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxyUtWSVvOAAkHNGrrhXjnbCWDfW5lMeE&callback=myMap"></script>';
    
    //Nacht    
    } else { 
        return '<div class="stageBackground stageBackground_night"></div>';
    }
 }