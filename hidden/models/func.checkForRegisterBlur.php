<?php
$path = dirname(realpath(__FILE__)) . '/';
require_once $path . 'func.sql.php';

//  Definiert Wert von "Benutzername"  für die Funktion auf der Seite
$username =  $_POST["Benutzername"];

//  Definiert Wert von "Benutzername"  für die Funktion auf der Seite
$email =  $_POST["Email"]; 

//  Verbindung zur Datenbasis
$link = sql_connect() or die("Error to connect DB" . mysqli_error($link));

if(isset($_POST["Benutzername"])) {

    //  Prüft Benutzername in der Datenbasis
    $query = "SELECT id, userMail ";
    $query .= "FROM user ";
    $query .= "WHERE (UPPER(username) = UPPER('" . $username . "'))";

    //  Ausführung des Querys 
    $results = $link->query($query) or exit("Error in the consult.." . mysqli_error($link));
    
    // Zählt die Anzahl der zurückgegebenen Datensätze 
    $username_exist = $results->num_rows; 
    
    //  Wenn das Ergebnis der Abfrage größer als 0, ist der Benutzername schon vergeben
    if($username_exist) {
        exit('<span class="checkReg fail"/><span class=messagespan>Dieser Benutzername ist bereits vergeben.</span>');
    } else {
        exit('<span class="checkReg ok" />');       
    }
}


if(isset($email)) {
    
    //  Pürft Email in der Datenbasis
    $query = "SELECT id, userMail ";
    $query .= "FROM user ";
    $query .= "WHERE (UPPER(userMail) = UPPER('" . $email . "'))";
    
    $results = $link->query($query) or exit("Error in the consult.." . mysqli_error($link));
  
    //  Wertet die Anfrage an die Datenbasis aus
    $email_exist = $results->num_rows; //records count
  
    //  Definiert nach Ergebnis der Prüfung die Ausgabe
    if (!filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) {
        exit('<span class="checkReg fail"/><span class=messagespan>Bitte geben Sie eine gültige Emailadresse an.</span>');
    } else if ($email_exist) {
        exit('<span class="checkReg fail"/><span class=messagespan>Diese Email-Adresse ist bereits registriert.</span>');
    } else {
        exit('<span class="checkReg ok" />');
    }
}