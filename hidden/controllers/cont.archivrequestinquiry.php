<?php
if(sizeof($_POST) > 0){
    // Wenn alles gut war, leite den benutzer zurück auf workedit mit http GET, nicht POST!!!!
    header("Location: workedit");
}
$link = $sql_con or die("Error " . mysqli_error($link));


//Übergibt den Wert der Postvariablen an die Session, da über die Sessionvariable der Dateninhalt gesteuer wird
if (isset($_POST['dataMark'])) {
    $_SESSION['dataMark'] = $_POST["dataMark"];
}

    $_SESSION['pageNumber'] = 10;
    $_SESSION['pageSize'] = 500;

$table = 'themes';
$tableID = 'themeID';

// Idee für die Zukunft, die Spaltennamen werden in ein array geschrieben und der Funktion übergeben so dass sich
// die Funktion automatisch auf jede Tabelle universell anwenden lässt. es muss dann nur noch die Abfrage für die
// Tabelle editiert werden.
//echo $_SESSION['themeID'];

    $query = "SELECT * ";
    $query .= "FROM " . $table . " ";
    $query .= "ORDER BY Datum DESC ";
    $query .= "LIMIT " . $_SESSION['pageSize'] . " ";
    $query .= "OFFSET " . $_SESSION['pageNumber'] . "";

    //execute the query.
    $themes = $link->query($query) or die("Fehler in der Anfrage Workedit.." . mysqli_error($link));
    $themes->fetch_all(MYSQLI_ASSOC);

    unset($_SESSION['pageNumber']);
    unset($_SESSION['pageSize']);
?>
