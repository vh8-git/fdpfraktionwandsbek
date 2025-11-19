<?php
// DRY = don´t repeat yourself
function regCode($regMail){
    
    // Registrierungscode für RegMail erstellen absichern
    // 1. Schritt: SALT erstellen (random für jeden User einzeln)
    $randomRegCode = $regMail . (uniqid( mt_rand(1, mt_getrandmax()), true ) );
  
    return $randomRegCode;
}