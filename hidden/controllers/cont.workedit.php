<?php
if(sizeof($_POST) > 0){
    // Wenn alles gut war, leite den benutzer zurück auf workedit mit http GET, nicht POST!!!!
    header("Location: workedit");
}
    $link = $sql_con or die("Error " . mysqli_error($link));

    $sql = "select count(*) as anzahl from stoerer";
    $result = mysqli_query($link,$sql);
    $data = mysqli_fetch_assoc($result);


    //Übergibt den Wert der Postvariablen an die Session, da über die Sessionvariable der Dateninhalt gesteuer wird
    if (isset($_POST['dataMark'])) {
        $_SESSION['dataMark'] = $_POST["dataMark"];
    }


    if (!isset($_SESSION['pageNumber']) && !isset($_SESSION['pageSize'])) {
        $_SESSION['pageNumber'] = 0;
        $_SESSION['pageSize'] = 1;
    }

    $table = 'stoerer';
    $tableID = 'stoererID';

    // Idee für die Zukunft, die Spaltennamen werden in ein array geschrieben und der Funktion übergeben so dass sich
    // die Funktion automatisch auf jede Tabelle universell anwenden lässt. es muss dann nur noch die Abfrage für die
    // Tabelle editiert werden.
echo $_SESSION['pageNumber'];
echo $_SESSION['stoererID'];
    if (isset($_SESSION["dataMark"]) && $_SESSION['dataMark'] == 0) {
        $query = "SELECT * ";
        $query .= "FROM " . $table . " ";
        if (($_SESSION['stoererID']) == null) {
            $query .= "ORDER BY " . $tableID . " DESC ";
            $query .= "LIMIT " . $_SESSION['pageSize'] . " ";
            $query .= "OFFSET " . $_SESSION['pageNumber'] . "";
        } else {
            $query .= "WHERE " . $tableID . " = " . $_SESSION['stoererID'] . "";
        }
        //execute the query.
        $result = $link->query($query) or die("Fehler in der Anfrage Workedit.." . mysqli_error($link));
        $row = mysqli_fetch_assoc($result);

        if (($_SESSION['stoererID']) == null) {
            $_SESSION['stoererID'] = $data['anzahl'];
        }

//        if(isset($_SESSION["info"])){
//            echo $_SESSION["info"];
//            $_SESSION["info"] = null;
//        }
    }



    if (isset($_SESSION["dataMark"]) && $_SESSION['dataMark'] == 7) {
        if ($_SESSION['stoererID'] < $data['anzahl']) {
            $_SESSION['stoererID']++;
        }
    }

    if (isset($_SESSION["dataMark"]) && $_SESSION['dataMark'] == 5) {
        if ($_SESSION['stoererID'] > 1) {
            $_SESSION['stoererID']--;
        }
    }

    if (isset($_SESSION['dataMark']) && $_SESSION['dataMark'] == 3) {

        //$query = "UPDATE 'stoerer' SET `aktiv` = '' WHERE `stoerer`.`stoererID` = 2";
        $query = "UPDATE stoerer SET headline1 = '" . $_POST['headline1'] . "', ";
        $query .= "headline2 = '" . $_POST['headline2'] . "', ";
        $query .= "linktext = '" . $_POST['linktext'] . "', ";
        $query .= "link = '" . $_POST['link'] . "', ";
        //$query .= "aktiv = 'ja' ";
        if (!isset($_POST['aktiv'])) { $query .= "aktiv = '' "; };
        if (isset($_POST['aktiv'])) { $query .= "aktiv = 'ja' "; };
        $query .= "WHERE stoerer . stoererID = " . $_SESSION['stoererID'] . "";

//        $query .= "WHERE stoererID = "', ";

        //execute the query
        $result = $link->query($query) or die("Error in the consult.." . mysqli_error($link));

        $_SESSION["info"] = "Erfolgreich geändert!";
    }

    if (isset($_SESSION["dataMark"]) && $_SESSION['dataMark'] == 1) {

        $query = "INSERT INTO `stoerer` (";
        $query .= "stoererID, ";
        $query .= "headline1, ";
        $query .= "headline2, ";
        $query .= "linktext, ";
        $query .= "link) ";

        $query .= "VALUES ('";
        $query .= /*$_POST['stoererID']*/ "". "', '";
        $query .= $_POST['headline1'] . "', '";
        $query .= $_POST['headline2'] . "', '";
        $query .= $_POST['linktext'] . "', '";
        $query .= $_POST['link'] . "')";

        $result = $link->query($query) or die("Fehler in der Anfrage.." . mysqli_error($link));

        $_SESSION['stoererID'] = $data['anzahl']+1;
    }

$_SESSION['dataMark'] = 0;

?>
