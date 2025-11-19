<?php
$script['header'] = 
           '<div class="stageBackground bgImageWork"></div>';
$script['socNav'] = '';
$script['barNav'] = '';
$script['selectNav'] = '';

$link = $sql_con or die("Error " . mysqli_error($link));


if (isset($_POST['registerConf_submitted']) && $_POST['registerConf_submitted'] == 1) {

    //    Überprüfung ob alle Pflichtfelder ausgefüllt sind und die Passwörter gleich sind. 
    $error = array();
    
    if ($_POST['userName'] == ''){
        $error[] = 'Bitte geben Sie Ihren Benutzernamen oder Ihre E-Mail-Adresse an.';
    }
    
    if ($_POST['userPassword'] == ''){
        $error[] = 'Bitte geben Sie Ihr Password an.';
    }
     
    //    Überprüfung ob Benutzer schon vorhanden anhand userName und userMail
    $query = "SELECT id, userName, userMail, userPassword, userSalt, userRegCode ";
    $query .= "FROM user ";
    $query .= "WHERE (UPPER(userName) = UPPER('" . $_POST["userName"] . "')) OR (UPPER(userMail) = UPPER('" . $_POST["userName"] . "'))";

    //Ausführung des Querys 
    $result = $link->query($query) or die("Error in the consult.." . mysqli_error($link));
    
    
    $id = 0;
    $salt = 0;
    $hashedPasswordDB = 0;
    
    //Auswertung des Rückgabe
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        $userDB = $row["userName"];
        $mailDB = $row["userMail"];
        $hashedPasswordDB = $row["userPassword"];
        $salt = $row["userSalt"];
        $userRegCodeDB = $row["userRegCode"];
    }
    
    $loginPassword = hash( 'sha512', $_POST['userPassword'] . $salt );

     //display information: 
    if ($loginPassword === $hashedPasswordDB) {

        if ($_POST['hidUserRegCode'] === $userRegCodeDB) {
        //var_dump('help');
            
            $_SESSION['login'] = 1;
            $_SESSION['user'] = $id;

            $query = "UPDATE user SET ";
            $query .= "userRegCode = '',";
            $query .= "userRights = 1 ";
            $query .= "WHERE id = " . $_SESSION['user'];

            $result = $link->query($query) or die("Error in the consult.." . mysqli_error($link));

            $error[] = "Danke Ihrer Registrierung ist abgeschlossen. Sie werden auf dem Startseite weitergeleitet.";
            

        } else {
            
            $error[] = 'Die Registrierung ist fehlgeschlagen.<br/>Bitte Wenden Sie sich über das Kontaktformular an uns.';
            
        }    

    } else {
        
        $error[] = 'Die Benutzerangaben stimmen nicht überein. Bitte die Angaben überprüfen oder registieren!';
    }

    $errors = count($error);
}