//Entfernen der Klasse "Logo-animation" nachdem die Seite geladen ist.
        
$(function() {
    $( ".logo-animation" ).mouseover(function() {
        $(this).removeClass("logo-animation");
    });
    //setTimeout(function(){alert("10 Sekunden vorbei")}, 10000);
});


$('.logo').bind('rightclick', function(){ 
    alert('right mouse button is pressed');
});
