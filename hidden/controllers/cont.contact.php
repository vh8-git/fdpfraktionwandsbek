<?php
$link = $sql_con or die("Error " . mysqli_error($link));

if (isset($_POST["flag"])) {
    $input = $_POST["input"];
    $flag = $_POST["flag"];
}

$error = array();
$message = array();
//    Überprüfung ob alle Pflichtfelder ausgefüllt sind und die Passwörter gleich sind. 


if (isset($_POST['refresh'])) {
    
    unset($_POST['refresh']); 
    
} else {

    if (isset($_POST['message_submitted']) && $_POST['message_submitted'] == 1) {

        if ($_POST['name'] == "") {
            $error[] = 'Es wurde kein Nachnamen angegeben.';
        }

        if ($_POST['firstName'] == "") {
            $error[] = 'Es wurde kein Vornamen angegeben.';
        }

        if (!filter_var($_POST["mailAddress"], FILTER_VALIDATE_EMAIL)) {
            //  !ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i] --- Alternative
            //  !preg_match("/^[\w%_\-.\d]+@[\w.\-]+\.[A-Za-z]{2,6}$/") --- Alternative
            $error[] = 'Bitte geben Sie eine gültige Emailadresse an.';
        }

        if ($_POST['message'] === "") {
            $error[] = 'Was ist Ihre Nachricht an uns?';
        }
    }

    
    
    $errors = count($error);

    if ($errors == 0) {
        
        if (isset($_POST['message_submitted']) && $_POST['message_submitted'] == 1 && $errors == 0) {
            //Setzt alle Variablen für das versenden einer Mail nach erfolgreichen Abschicken des MessageFormulars
            $empfaenger = "web@vh8.de";
            $betreff = "Message von vh8-Kontakt";
            $from = "From: " . $_POST['firstName'] . " " . $_POST['name'] . "<" . $_POST['mailAddress'] .">\n";
            $from .= "Reply-To: "  . $_POST['mailAddress'] ."\n";
            $from .= "Content-Type: text/html\n";
            $text = "<pre style='font-size: 16px; font-family: sans-serif; line-height: 24px;'>" .$_POST['message'] . "</pre>";

            if (isset($_SESSION[SESSION_STRING]) && $input == $_SESSION[SESSION_STRING]) {
                //    Verbindet zu Datenbank
                //    Überprüfung ob Benutzer schon vorhanden anhand userName und userMail
                $query = "SELECT id, userMail ";
                $query .= "FROM user ";
                $query .= "WHERE (UPPER(userMail) = UPPER('" . $_POST["mailAddress"] . "'))";

                //Ausführung des Querys 
                $result = $link->query($query) or die("Error in the consult.." . mysqli_error($link));

                //Auswertung des Rückgabe
                while ($row = mysqli_fetch_assoc($result)) {
                    $userIdDB = $row["id"];
                    $mailDB = $row["userMail"];
                }

                if (isset($mailDB) && (strtoupper($mailDB) == strtoupper($_POST['mailAddress']))) {

                    //Speichert neuen Datensatz mit Nachrichtentext und der userID in TABmessage
                    $query2 = "INSERT INTO message (";
                    $query2 .= "userID, ";
                    $query2 .= "message) ";
                    $query2 .= "VALUES ('";
                    $query2 .= $userIdDB . "', '";
                    $query2 .= utf8_decode($_POST['message']) . "')";

                    $result2 = $link->query($query2) or die("Error in the consult.." . mysqli_error($link));

                    $message[] = 'Vielen Dank für Ihre Nachricht.';
                    $success = "Unser Server hat Ihre Nachricht empfangen.";
                } else {

                    $password = messagePassword();

                    //Speichert neuen Datensatz in TABuser
                    $query3 = "INSERT INTO user (";
                    $query3 .= "userMail, ";
                    $query3 .= "userPassword, ";
                    $query3 .= "userSalt, ";
                    $query3 .= "userFirstName, ";
                    $query3 .= "userSecondName) ";
                    $query3 .= "VALUES ('";
                    $query3 .= $_POST['mailAddress'] . "', '";
                    $query3 .= $password['password']. "', '";
                    $query3 .= $password['salt'] . "', '";
                    $query3 .= $_POST['firstName'] . "', '";
                    $query3 .= $_POST['name'] . "')";

                    $result3 = $link->query($query3) or die("Error in the consult.." . mysqli_error($link));

                    $userIdDB = mysqli_insert_id($link);

                    $message[] = 'Ihre Mailadresse und Ihr Name Name wurden gespeichert.<br/>Wir nutzen die Daten nur zur Kontaktaufnahme mit Ihnen.';
                    $success = "Unser Server hat Ihre Nachricht empfangen.<br/>Wir melden uns umgehend.";
//                    $success .= "\n Unser Server hat Ihre Nachricht empfangen.<br/>Wir melden uns umgehend.";
                    //Ermittelt Id des neuen users aus TABuser
                    $query4 = "SELECT * ";
                    $query4 .= "FROM user ";
                    $query4 .= "WHERE (UPPER(userMail) = UPPER('" . $_POST["mailAddress"] . "'))";

                    $result4 = $link->query($query4) or die("Error in the consult.." . mysqli_error($link));

                    while ($row2 = mysqli_fetch_array($result4)) {
                        $userIdDB = $row2["id"];
                    }
                    //Speichert neuen Datensatz mit Nachrichtentext und der userID in TABmessage
                    $query5 = "INSERT INTO message (";
                    $query5 .= "userID, ";
                    $query5 .= "message) ";
                    $query5 .= "VALUES ('";
                    $query5 .= $userIdDB . "', '";
                    $query5 .= utf8_decode($_POST['message']) . "')";

                    $result5 = $link->query($query5) or die("Error in the consult.." . mysqli_error($link));
                    
                    // Schicke ein Mail mit dem Inhalt der Message an die Mailadresse "web@vh8.de"
                    
                    mail($empfaenger, $betreff, $text, $from);
                    
                }     
            } else {

                $error[] = 'Ihre Eingabe der Zeichenfolgen stimmt nicht mit der Abbildung überein';

            }

        }

    }

}


$errors = count($error);
$messages = count($message);



if ($errors > 0) {

    $output = $error;

} else if ($messages > 0) {
    
    $output = $message;

} else {

    $output = '<span class="mail_intro" >Nutzen Sie vorzugsweise unser Messageformular für die schnellste Kontaktaufnahme zu uns.</span>';

}
?>