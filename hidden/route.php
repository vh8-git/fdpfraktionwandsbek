<?php
// Was soll passieren, wenn kein CASE vorhanden ist? --> page-parameter nicht gesetzt
// Aufgabe dieser if-else Abfrage: $page soll immer einen Wert haben
// damit wir eine Seite anzeigen können

$_GET = array_merge($_GET, parseUrl($_SERVER['REQUEST_URI']));

if ( isset($_SESSION['login']) && $_SESSION['login'] == 1) :
    echo '<pre>';
    //var_dump($_GET);
//      var_dump($_POST);
//      var_dump($_SESSION);
    //var_dump($result);
    echo '</pre>';
endif;

// Verhalten festlegen:
// Wenn es den Page-Parameter gibt und dieser NICHT leer ist
if( isset($_GET['page']) && $_GET['page'] !== '' ){
    
    // dann speichere in die $page-Variable den übergebenen GET-Parameter
    $page = whitelist($_GET['page']);
    
}
else{
    
    // Falls kein GET-Parameter vorhanden ist
    // also page keinen value hat oder nicht vorhanden ist (nicht in der url auftaucht)
    $page = 'work';
    
}