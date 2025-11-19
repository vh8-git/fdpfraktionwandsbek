<?php

<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAxyUtWSVvOAAkHNGrrhXjnbCWDfW5lMeE'></script>

<div style='overflow:hidden;height:400px;width:800px;'>
    <div id='gmap_canvas' style='height:500px;width:520px;'></div>
    <style>gmap_canvas img{max-width:none!important;background:none!important}</style>
</div>
<a href='https://embedmaps.net'>embed google map wordpress</a>
<script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=9a87234fe684c080808cf092a545d74f12cddcd6'></script>
<script type='text/javascript'>
    function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(53.7246,10.01240000000007),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(53.7246,10.01240000000007)});infowindow = new google.maps.InfoWindow({content:'<strong></strong><br>Fehmarnstraße, 11<br>22846 Norderstedt<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>



<div id="googleMap" style="width:100%;height:400px;"></div>

<script>
function myMap() {
    var mapProp= {center:new google.maps.LatLng(51.508742,-0.120850),zoom:5,};
    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxyUtWSVvOAAkHNGrrhXjnbCWDfW5lMeE&callback=myMap"></script>



/**
 * Created by PhpStorm.
 * User: vonhacht
 * Date: 2019-04-09
 * Time: 23:13
 */


<-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-58031633-2"></script>
<script>
window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-58031633-2');
</script>

