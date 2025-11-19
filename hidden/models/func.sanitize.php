<?php
/* sanitize
 * Beschreibung: Bereinigt einen String, der direkt aus einem Formular stammt.
 * @param   $formValue      String              Der nicht bereinigte String
 * @param   $numberFormat   String/(Boolean)    Optionaler Parameter, falls nicht gesetzt = false
 * @return  $sanitized      String/Int/Float    Der formatierte String im gewünschten Datentyp
 */
function sanitize( $formValue, $numberFormat = false ){
    
    if( $numberFormat === false ){
        
        $sanitized = htmlspecialchars(strip_tags(trim($formValue)));
        
    }elseif( $numberFormat === 'int' ){
        
        $sanitized = intval(htmlspecialchars(strip_tags(trim($formValue))));
        
    }elseif( $numberFormat === 'float' ){
        
        $sanitized = floatval(htmlspecialchars(strip_tags(trim($formValue))));
        
    }
    
    return $sanitized;
    
}