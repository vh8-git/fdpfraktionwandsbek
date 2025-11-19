// Setzt die Font_Grundlinie auf Horizontal von 3.5° nach oben über Klassenwechsel
$('#gerade').click(function(){

    if($('#stage').hasClass('skew')) {

        $('#stage').removeClass('skew').addClass('gerade');
        $('#gerade').removeClass('gerade').addClass('skew');
        $('#gerade').html("Schrift schräg");
        $('button[id^="ge]').addClass('skew');
        $('button[id^=px]').removeClass('skew');

    }else{

        $('#stage').removeClass('gerade').addClass('skew');
        $('#gerade').removeClass('skew').addClass('gerade');
        $('#gerade').html("Schrift gerade");
        $('button[id^="ge]').removeClass('gerade');
        $('button[id^=px]').addClass('skew');
    }
});

//Setzt fontsize in Stage auf 24px über Klassenwechsel
$('button#px16').click(function(){

    if($('#stage .font').hasClass('mittel')) {
        $('#stage .font').removeClass('mittel').addClass('normal');
    }

    else if ($('#stage .font').hasClass('gross')){
        $('#stage .font').removeClass('gross').addClass('normal');
    }
});

//Setzt fontsize in Stage auf 24px über Klassenwechsel
$('button#px24').click(function(){

    if($('#stage .font').hasClass('normal')) {
        $('#stage .font').removeClass('normal').addClass('mittel');
    }

    else if ($('#stage .font').hasClass('gross')){
        $('#stage .font').removeClass('gross').addClass('mittel');
    }
});

//Setzt fontsize in Stage auf 32px über Klassenwechsel
$('button#px32').click(function(){

    if($('#stage .font').hasClass('normal')) {
        $('#stage .font').removeClass('normal').addClass('gross');
    }

    else if ($('#stage .font').hasClass('mittel')){
        $('#stage .font').removeClass('mittel').addClass('gross');
    }
});


// Nimm allen Elementen mit ID "px" beginnend bei click die Klasse active
//  und setze auf das geklickte Element die Klasse active 
$('button[id^=px]').click(function(){

    $('button[id^=px]').removeClass('active');
    $(this).addClass('active');

});
