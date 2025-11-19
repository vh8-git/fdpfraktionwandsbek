<?php
//Start der Session. Muss in der Index.php erfolgen, da sonst ein Fehler auftritt
session_start();


//Setzt den Konfigurationspfad angriffsicher"er" als absoluten Pfad 
//für die config.php über die Erstellung einer Variablen und löscht
//diese nach Gebrauch sofort wieder
$preHiddenPath = substr(dirname(realpath(__FILE__)), 0, -6) . 'hidden/';
require_once $preHiddenPath . 'config_fdp.php';
unset($preHiddenPath);

// 
require_once APP_PATH . 'route.php';


// mainController einbinden
require_once APP_PATH . 'controllers/cont.main_fdp.php';

// Dieses ist die letze Zeile, die bei einem Seitenaufruf im MVC geladen wird
// Tschüss