<?php
    

if (!isset($_SESSION['login']) && isset($_POST["userName"]) && isset($_POST["userPassword"])) {
    if ($_POST['userName'] == "") {
        $error[] = 'Bitte Benutzername oder Mail angeben.';
    } else {
        $link = $sql_con or die("Error " . mysqli_error($link));
        //consultation: 
        $query = "SELECT * ";
        $query .= "FROM user ";
        $query .= "WHERE userRights = 1 ";
    //    $query .= "and userPassword = '" . $_POST["userPassword"] . "'";
        $query .= "and (UPPER(userName) = UPPER('" . $_POST["userName"] . "') or UPPER(userMail) = UPPER('" . $_POST["userName"] . "')) ";

        //execute the query. 
        $result = $link->query($query) or die("Error in the consult.." . mysqli_error($link));
        
//      Die Variablen werden hier gelistet damit sie in der folge immer vorhanden sind.
//      So hat man alle verwendeten Variablen auch immer gut im Blick.
//      Wie kann ich vermeiden dass ich die Variablen aller vordefinieren muss? Elegantere Lösung?
        $id = 0;
        $salt = 0;
        $hashedPassword = 0;
        
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $salt = $row["userSalt"];
            $hashedPassword = $row["userPassword"];
        }

        //$loginPassword = hash( 'sha512', $_POST['userPassword'] . $salt );
        $loginPassword = $_POST['userPassword'];

         //display information: 
        if ($loginPassword === $hashedPassword) {
            $_SESSION['login'] = 1;
            $_SESSION['user'] = $id;
            header('Location: createUrl(["page" => "userInfo"])');
        } else {
            $error[] = 'Die Benutzerangaben stimmen nicht überein. Bitte die Angaben überprüfen oder registieren!';
        }
    }
    
}

//Setzt den Default zur Anzeige der jeweiligen Daten auf der CMS Editor Seite wenn User eingelockt ist
// Werte für $_SESSION['dataMark']
// default   = 0
// new       = 1
// copy      = 2
// save      = 3
// delete    = 4
// nextleft  = 5
// gotoFirst = 6
// nextright = 7
// gotolast  = 8


$_SESSION['dataMark'] = 0;
//var_dump($_SESSION['dataMark']);