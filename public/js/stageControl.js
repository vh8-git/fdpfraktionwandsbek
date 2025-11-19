//Ausführung beim Documentladen
$(document).ready(function() {
     stageResize();
});


//Ausführung bei Änderung der Fensterhöhe
$(window).resize(function() {
    stageResize();
});

// Die Funktion passt die Höhe der "Stage" 
// an die Fensterhöhe an und berücksichtigt dabei StageHead und StageBottom
function stageResize() {

    $('#stage').css({
        height: ($(window).height() - ($('.stageHead').height()/9*16))
    });
};

//funktion so umschreiben, dass alle nichtzugehören ausgegraut werden und die zugehörigen 102% groß werden.
//function mit "this" realisieren
$(function() {
    $( ".design" ).mouseover(function() {
        $('#C1').removeClass().addClass("selectAnimation");
        $('#C2').removeClass().addClass("selectAnimation");
        $('#C4').removeClass().addClass("selectAnimation");
        $('#C5').removeClass().addClass("selectAnimation");
        $('#C7').removeClass().addClass("selectAnimation");
        $('#C8').removeClass().addClass("selectAnimation");
        $('.case').addClass('unselect');
    });
});
   

$(function() {
    $( ".design" ).mouseleave(function() {
        $('#C1').removeClass().addClass("case");
        $('#C2').removeClass().addClass("case");
        $('#C4').removeClass().addClass("case");
        $('#C5').removeClass().addClass("case");
        $('#C7').removeClass().addClass("case");
        $('#C8').removeClass().addClass("case");
        $('.case').removeClass('unselect');
    });
});

$(function() {
    $( ".development" ).mouseover(function() {
        $('#C3').removeClass().addClass("selectAnimation");
        $('.case').addClass('unselect');
    });
});
   

$(function() {
    $( ".development" ).mouseleave(function() {
        $('#C3').removeClass().addClass('case');
        $('.case').removeClass('unselect');
    });
});

$(function() {
    $( ".artwork" ).mouseover(function() {
        $('#C6').removeClass().addClass("selectAnimation");
        $('#C6 img').addClass('blopp');
        $('.case').addClass('unselect');
    });
});
   

$(function() {
    $( ".artwork" ).mouseleave(function() {
        $('#C6').removeClass().addClass('case');
        $('#C6 img').removeClass('blopp');
        $('.case').removeClass('unselect');
    });
});