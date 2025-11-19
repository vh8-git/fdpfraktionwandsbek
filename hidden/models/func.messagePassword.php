<?php
// DRY = don´t repeat yourself
function messagePassword(){
    
    // Passwort absichern
    // 1. Schritt: SALT erstellen (random für jeden User einzeln)
    $randomSalt = hash( 'sha512', uniqid( mt_rand(1, mt_getrandmax()), true ) );
    // 2. Schritt: das übergebene Passwort versalzen
    $hashedPW = hash( 'sha512', "vh8" . $randomSalt );
    
    $password['password'] = $hashedPW;
    $password['salt'] = $randomSalt;
    
    return $password;
}