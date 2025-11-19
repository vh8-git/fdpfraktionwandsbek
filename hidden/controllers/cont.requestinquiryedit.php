<?php
if(sizeof($_POST) > 0){
    // Wenn alles gut war, leite den benutzer zurück auf workedit mit http GET, nicht POST!!!!
    header("Location: requestinquiryedit");
}
    $link = $sql_con or die("Error " . mysqli_error($link));

    $sql = "select count(*) as anzahl from themes";
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

    $pageNumber = $_SESSION['pageNumber'];
    $pageSize = $_SESSION['pageSize'];
    $table = 'themes';
    $tableID = 'themeID';


    // Idee für die Zukunft, die Spaltennamen werden in ein array geschrieben und der Funktion übergeben so dass sich
    // die Funktion automatisch auf jede Tabelle universell anwenden lässt. es muss dann nur noch die Abfrage für die
    // Tabelle editiert werden.
//echo $_SESSION['pageNumber'];
//echo $_SESSION['pageSize'];
//echo $_SESSION['themeID'];
//echo $pageNumber;

    if (isset($_SESSION["dataMark"]) && $_SESSION['dataMark'] == 0) {

        $query = "SELECT * FROM themes ORDER BY themeID DESC LIMIT 1 OFFSET $pageNumber";


        //execute the query.
        $result = $link->query($query) or die("Fehler in der Anfrage Themeedit.." . mysqli_error($link));
        $row = mysqli_fetch_assoc($result);


$_SESSION['themeID'] = $data['anzahl'] - $pageNumber;


//        if(isset($_SESSION["info"])){
//            echo $_SESSION["info"];
//            $_SESSION["info"] = null;
//        }
    }


    //Vorheriger Datensatz
    if (isset($_SESSION["dataMark"]) && $_SESSION['dataMark'] == 7) {
        if ($_SESSION['pageNumber'] < $data['anzahl']-1) {
            $_SESSION['pageNumber']++;
        }
    }
    //Nächster Datensatz
    if (isset($_SESSION["dataMark"]) && $_SESSION['dataMark'] == 5) {
        if ($_SESSION['pageNumber'] > 0) {
            $_SESSION['pageNumber']--;
        }
    }
    //Aktualisierung des Datensatzes
    if (isset($_SESSION['dataMark']) && $_SESSION['dataMark'] == 3) {

        //$query = "UPDATE 'stoerer' SET `aktiv` = '' WHERE `stoerer`.`stoererID` = 2";
        $query = "UPDATE themes SET Datum = '" . $_POST['Datum'] . "', ";
        $query .= "Link = '" . $_POST['Link'] . "', ";
        $query .= "DrsNumber = '" . $_POST['DrsNumber'] . "', ";
        $query .= "Antrag = '" . $_POST['Antrag'] . "', ";
        $query .= "Thema = '" . $_POST['Thema'] . "' ";
        $query .= "WHERE themes . themeID = " . $_SESSION['themeID'] . "";


        //execute the query
        $result = $link->query($query) or die("Error in the consult.." . mysqli_error($link));

        $_SESSION["info"] = "Erfolgreich geändert!";


    }
    //Neuer Datensatz
    if (isset($_SESSION["dataMark"]) && $_SESSION['dataMark'] == 1) {

        $query = "INSERT INTO themes (themeID, Datum, Link, DrsNumber, Antrag, Thema) VALUES ('', '', '', '', '', '')";

        $result = $link->query($query) or die("Fehler in der Anfrage.." . mysqli_error($link));

        $_SESSION['pageNumber'] = 0;
    }

    //Kopie des Datensatzes
    if (isset($_SESSION["dataMark"]) && $_SESSION['dataMark'] == 2) {

        $query = "INSERT INTO `themes`(`themeID`, `Datum`, `Link`, `DrsNumber`, `Antrag`, `Thema`)  VALUES ('', '" . $_POST['Datum'] ."', '" . $_POST['Link'] ."', '" . $_POST['DrsNumber'] ."', '" . $_POST['Antrag'] ."', '" . $_POST['Thema'] ."')";

        $result = $link->query($query) or die("Fehler in der Copyzugriff.." . mysqli_error($link));

        $_SESSION['pageNumber'] = 0;
    }

$_SESSION['dataMark'] = 0;

?>
