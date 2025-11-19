<?php
$link = $sql_con or die("Error " . mysqli_error($link));
    
    if (isset($_POST['userinfo_submitted']) && $_POST['userinfo_submitted'] == 1) {
    $query = "UPDATE user ";
    $query .= "SET userMail = '" . $_POST['Email'] . "'";
    if ($_POST['Vorname']) { $query .= ", userFirstName = '" . $_POST['Vorname'] . "'"; }
    if ($_POST['Nachname']) { $query .= ", userSecondName = '" . $_POST['Nachname'] . "'";  }
    if ($_POST['Straße']) { $query .= ", userStreet = '" . $_POST['Straße'] . "'"; }
    if ($_POST['Hausnummer']) { $query .= ", userHouse = '" . $_POST['Hausnummer'] . "'"; }
    if ($_POST['Ort']) { $query .= ", userPlace = '" . $_POST['Ort'] . "'"; }
    if ($_POST['PLZ']) { $query .= ", userZIP = '" . $_POST['PLZ'] . "'"; }
    if ($_POST['Telefon']) { $query .= ", userPhone = '" . $_POST['Telefon'] . "'"; }
    if ($_POST['Mobil']) { $query .= ", userMobile = '" . $_POST['Mobil'] . "'"; }
    $query .= "WHERE id = " . $_SESSION["user"];

    //execute the query. 
    $result = $link->query($query) or die("Error in the consult.." . mysqli_error($link));
    }
    
    //consultation: 
    $query = "SELECT userName as Benutzername, ";
//    $query .= "userPassword as Passwort, ";
    $query .= "userFirstName as Vorname, ";
    $query .= "userSecondName as Nachname, ";
    $query .= "userMail as Email, ";
    $query .= "userStreet as Straße, ";
    $query .= "userHouse as Hausnummer, ";
    $query .= "userPlace as Ort, ";
    $query .= "userZIP as PLZ, ";
    $query .= "userPhone as Telefon, ";
    $query .= "userMobile as Mobil ";
    $query .= "FROM user ";
    $query .= "WHERE id = " . $_SESSION["user"];
    //execute the query. 
    $result = $link->query($query) or die("Error in the consult.." . mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
?>