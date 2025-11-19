<?php

// $dirty = 'Hallo';
function whitelist($dirty){
    
    // dirty ist ein String
    // wir machen aus dem String ein Array
    $dirtyArray = str_split($dirty);
    
//    array(5){
//        [0] => 'H',
//        [1] => 'a',
//                usw.
//    }
    
    // leiten wir die $clean-Variable ein 
    // (falls foreach fehlschlägt, vermeiden wir den Fehler "undefined variable")
    $clean = '';
    
    // dann durchlaufen wir das dirtyArray
    // indem jeder Eintrag einem Buchstaben/Zeichen aus dem übergebenem String entspricht
    foreach($dirtyArray as $character){
        
        // Überprüfung eines Zeichens auf ein erlaubtes Muster
        // Muster, Ersetzung, Suchstring
        $cleanChar = preg_replace("/[^a-zA-Z0-9]/", "", $character);
        
        $clean .= $cleanChar;
        
    }
    
    return $clean;
}