<?php

function parseUrl($url) {
    
    // die einzelnen Teile voneinander trennen
    // aus dem übergebenen String wird ein Array
    $parts = explode('/', $url); // $parts[0] ist die baseUrl

    // Zählt die übergebenen GET-Parameter
    if (count($parts) < 5) {
        
        $i = 0;
        // schreibt das erste Parameter in ein eigenes Array und übergibt es an den Funktionsaufruf
        // und die weiteren Parameter werden wenn vorhanden in ein eigenes SUBarray von $_SESSION geschrieben 
        foreach($parts as $val) {
            
            if($i <= 1) {
                
                $arrayURL['page'] = $val;
            
            } else {

                $arrayTwo['subparts'][] = $val;
                
            }
            
            $i++;
        
        }

        if(isset($arrayTwo)) {
        
            $_SESSION['subparts'] = $arrayTwo;
        
        }

        return $arrayURL;

    }
    
}