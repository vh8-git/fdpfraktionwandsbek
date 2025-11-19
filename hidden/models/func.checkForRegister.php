<?php
$path = dirname(realpath(__FILE__)) . '/';
require_once $path . 'func.sql.php';

//  Verbindung zur Datenbasis
$link = sql_connect() or die("Error to connect DB" . mysqli_error($link));


if (!isset($_POST['register_submitted']) && isset($_POST["usernameBlur"])) {

    //  Prüft Benutzername in der Datenbasis
    $query = "SELECT id, userMail ";
    $query .= "FROM user ";
    $query .= "WHERE (UPPER(username) = UPPER('" . $_POST["Benutzername"] . "'))";

    //  Ausführung des Querys 
    $results = $link->query($query) or exit("Error in the consult.." . mysqli_error($link));
    
    // Zählt die Anzahl der zurückgegebenen Datensätze 
    $username_exist = $results->num_rows; 
    
    //  Wenn das Ergebnis der Abfrage größer als 0, ist der Benutzername schon vergeben
    if($username_exist) {
        exit('<span class="checkReg fail"/><span class=messagespan>Dieser Benutzername ist bereits vergeben.</span>');
    } else {
        exit('<span class="checkReg ok" />'); 
        unset($_POST["usernameBlur"]);
    }
}


if (!isset($_POST['register_submitted']) && isset($_POST["Benutzername"])) {

    //  Prüft Benutzername in der Datenbasis
    $query = "SELECT id, userMail ";
    $query .= "FROM user ";
    $query .= "WHERE (UPPER(username) = UPPER('" . $_POST["Benutzername"] . "'))";

    // Ausführung des Querys 
    $results = $link->query($query) or exit("Error in the consult.." . mysqli_error($link));

    $username_exist = $results->num_rows; //records count
  
    //if returned value is more than 0, username is not available
    if($username_exist) {
        exit('<span class="checkReg fail"/><span class=messagespan>Dieser Benutzername ist bereits vergeben.</span>');
    } else {
        exit('<span class="checkReg okOnWork Hier funzt was nicht" />');
    }
}


if(!isset($_POST['register_submitted']) && isset($_POST["emailBlur"])) {
    
    //  Pürft Email in der Datenbasis
    $query = "SELECT id, userMail ";
    $query .= "FROM user ";
    $query .= "WHERE (UPPER(userMail) = UPPER('" . $_POST["Email"] . "'))";
    
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
        unset($_POST["emailBlur"]);
    }
}


if (!isset($_POST['register_submitted']) && isset($_POST["Email"])) {
    
    //  Pürft Email in der Datenbasis
    $query = "SELECT id, userMail ";
    $query .= "FROM user ";
    $query .= "WHERE (UPPER(userMail) = UPPER('" . $_POST["Email"] . "'))";
    
    $results = $link->query($query) or exit("Error in the consult.." . mysqli_error($link));
  
    //  Wertet exit Anfrage an exit Datenbasis aus
    $email_exist = $results->num_rows; //records count
  
    //  Definiert nach Ergebnis der Prüfung exit Ausgabe
    if($email_exist) {
        exit('<span class="checkReg fail"/><span class=messagespan>Diese Email-Adresse ist bereits registriert.</span>');
    } else {
        exit('<span class="checkReg okOnWork1" />');
    }
}


