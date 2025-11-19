<?php
$script['header'] = 
           '<div class="stageBackground bgImageWork"></div>';
$script['socNav'] = '';
$script['barNav'] = '';
$script['selectNav'] = '';

if (isset($_POST['register_submitted']) && $_POST['register_submitted'] == 1) {

    $link = $sql_con or die("Error " . mysqli_error($link));

    //    Überprüfung ob alle Pflichtfelder ausgefüllt sind und die Passwörter gleich sind. 
    $error = array();
    
    if ($_POST['Benutzername'] == '' || strlen($_POST['Benutzername']) < 6 || strlen($_POST['Benutzername']) > 12){
        $error[] = 'Bitte geben Sie einen Benutzernamen an. (Min. 6 und max. 12 Zeichen.)';
    }
    
    //    Password überprüfen

    $pwd = $_POST['clearPasswort'];

    if( strlen($pwd) < 7 ) {$error[] = "Das Passwort ist zu kurz!";}

    if( strlen($pwd) > 12 ) {$error[] = "Das Passwort ist zu lang!";}

    if( !preg_match("#[0-9]+#", $pwd) ) {$error[] = "Das Passwort muss eine Zahl enthalten!";}

    if( !preg_match("#[a-z]+#", $pwd) ) {$error[] = "Das Passwort muss einen kleinen Buchstaben enthalten!";}

    if( !preg_match("#[A-Z]+#", $pwd) ) {$error[] = "Das Passwort muss einen großen Buchstaben enthalten!";}

    if( !preg_match("#\W+#", $pwd) ) {$error[] = "Das Passwort muss ein Sonderzeichen enthalten!";}
    
    if ($_POST['clearPasswortWiederholung'] !== $_POST['clearPasswort']){$error[] = 'Die Passwortabgaben stimmen nicht überein.';}

    if (!filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) {
        //  !ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i] --- Alternative
        //  !preg_match("/^[\w%_\-.\d]+@[\w.\-]+\.[A-Za-z]{2,6}$/") --- Alternative
        $error[] = 'Bitte geben Sie eine gültige Emailadresse an.';
    }
    
    //    Überprüfung ob Benutzer schon vorhanden anhand userName und userMail
    $query = "SELECT userName, userMail ";
    $query .= "FROM user ";
    $query .= "WHERE (UPPER(userName) = UPPER('" . $_POST["Benutzername"] . "')) OR (UPPER(userMail) = UPPER('" . $_POST["Email"] . "'))";

    //Ausführung des Querys 
    $result = $link->query($query) or die("Error in the consult.." . mysqli_error($link));

    //Auswertung des Rückgabe
    while ($row = mysqli_fetch_array($result)) {
        $userDB = $row["userName"];
        $mailDB = $row["userMail"];
    }

    if (isset($userDB) && (strtoupper($userDB) == strtoupper($_POST['Benutzername']))) {
        $error[] = 'Der Benutzername ist schon verhanden. Bitte wählen Sie einen anderen Benutzernamen';
    }
    
    if (isset($mailDB) && (strtoupper($mailDB) == strtoupper($_POST['Email']))) {
        $error[] = 'Der Benutzer-Mail ist schon verhanden. Bitte wählen Sie eine andere Benutzer-Mail';
    }
    
    $errors = count($error);
    
    if ($errors > 0) {

        $output = $error;
        
    } else {
        //  Hashen des Passworts
        $password = register( $_POST['clearPasswort']);
        //  Erstellen des Registrierungscode
        $randomRegCode = regCode ('REG');
        
        $query = "INSERT INTO user (";
        $query .= "userName, ";
        $query .= "userMail, ";
        $query .= "userPassword, ";
        $query .= "userSalt, ";
        $query .= "userRegCode, ";
        $query .= "userFirstName, ";
        $query .= "userSecondName, ";
        $query .= "userMobile) ";
        $query .= "VALUES ('";
        $query .= $_POST['Benutzername'] . "', '";
        $query .= $_POST['Email'] . "', '";
        $query .= $password['password']. "', '";
        $query .= $password['salt'] . "', '";
        $query .= $randomRegCode . "', '";
        $query .= $_POST['Vorname'] . "', '";
        $query .= $_POST['Nachname'] . "', '";
        $query .= $_POST['Mobil'] . "')";

        //execute the query. 
        $result = $link->query($query) or die("Error in the consult.." . mysqli_error($link));

        $output = "Sie wurden als Benutzer registriert. Bitte klicken Sie auf den Link in der Mail, um Ihre Registrierung abzuschließen.\t\n Diese Mail wird in wenigen Minuten versandt. Diese dient der Sicherheit des Datenbestandes. Möglicherweise finden Sie die Mail in Ihrem Spam-Ordner, da diese Mail automatisch generiert wird. ";
     
        // Mail an User der sich registriert hat, mit Aufforderung die Registrierung abzuschließen
        $empfaenger = $_POST['Email'];
        $betreff = "Ihre Registrierung auf vh8.de / " . date('d.m.y H:m');
        $from = "From: <web@vh8.de>\n";
        $from .= "Reply-To: <web@vh8.de>\n";
        $from .= "Content-type: text/html; UTF-8";
        $from .= "MIME-Version: 1.0\r\n";
        $from .= "X-Mailer: PHP ". phpversion();
        $text .= "Sehr geehrte/r Benutzer/in,<br/><br/>";
        $text .= "<br/>";
        $text .= "Vielen Dank für Ihrer Registrierung auf unserer Web-Side 'www.vh8.de'. ";
        $text .= "Nutzen Sie bitte nachfolgenden Link um die Registrierung abzuschließen. <br/>";
        $text .= "<br/>";
        $text .= "http://www.fdpfraktionwandsbek.de/registerConf&userRegCode=" . $randomRegCode . "<br/>";
        $text .= "<br/>";
        $text .= "Sollte der Link nicht automatisch funktionieren, kopieren Sie diesen bitte in Ihren Web-Browser.<br/>";
        $text .= "<br/>";
        $text .= "Sie werden auf unsere Seite 'Registrierungsbestätigung' geleitet und das System schließt die Registrierung automatisch ab.<br/><br/>";
        $text .= "Sollten Sie die Registrierung nicht veranlasst haben, brauche Sie nichts tun. Die Daten die zur Registrierung angegeben wurden, werden nach einem Monat gelöscht undder Registrierungsvorgang abgebrochen.<br/>";
        $text .= "<br/>";
        $text .= "Mit freundlichem Gruß<br/>";
        $text .= "Andreas von Hacht<br/>";
        $text .= "<br/>";
        $text .= "vhD<br/>";
        $text .= "Fehmarnstraße 11<br/>";
        $text .= "D-22846 Norderstedt<br/>";
        $text .= "Tel.: +49 179 486 97 97<br/>";
        $text .= "Mail: web@vh8.de<br/>";
        
        mail($empfaenger, $betreff, $text, $from);
    }
}