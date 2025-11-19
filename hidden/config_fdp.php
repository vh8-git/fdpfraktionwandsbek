<?php
// Applikationspfad
// realpath: erzeugt einen absoluten Pfad

define('APP_PATH', dirname(realpath(__FILE__)) . '/');



// Debug
// Fehlermeldungen aktivieren
// Ausblick: Erweiterung je nach Umgebung: DB-Connection hinzufügen
$environment = 'local';



switch($environment){
    
    case 'local':
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    break;
 
    case 'staging':
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    break;

    case 'live':
        // KEINE Fehlermeldungen
    break;

}


//Globale Funktionen
require_once APP_PATH . 'models/func.whitelist.php';
require_once APP_PATH . 'models/func.createUrl.php';
require_once APP_PATH . 'models/func.parseUrl.php';
require_once APP_PATH . 'models/func.initialize.php';


//Steuert das Intro 
//Setzt Index für Status und Zeit wenn nicht vorhanden oder prüft Status und Zeit, löscht dann Session oder setze Zeitstempel neu, wenn Inaktivität noch nicht abgelaufen ist.
if (!isset($_SESSION['expire'])) {
    
    $_SESSION['intro'] = '1';
    $_SESSION['expire'] = time();

} else if (time() - $_SESSION['expire']  > 36000) {
                                           //Zeitspann für Inaktivität
    unset($_SESSION);
    session_destroy();
    session_start();
    $_SESSION['intro'] = '1';
    $_SESSION['expire'] = time();

} else {

    $_SESSION['expire'] = time();
}


//Definition des Sessionstrings für die Captchafunktion
define ("SESSION_STRING", "captcha_string");
// Parameter zur Erzeugung eines universellen Dateinamens für das Image in der Captchafunktion
$_SESSION['extra']=time();
// Vordifinition der Variablen über die das Absenden des Kontaktfomulars geprüft wird
$flag = 0;

SESSION_initialize();




//Definition des Host zum SQL-Connect in der Variablen "$sql_con"

require_once APP_PATH . 'models/func.sql.php';

$sql_con = sql_connect();


date_default_timezone_set('europe/berlin');