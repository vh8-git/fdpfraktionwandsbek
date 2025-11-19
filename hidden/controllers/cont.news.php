<?php
if(sizeof($_POST) > 0){
    // Wenn alles gut war, leite den benutzer zurück auf workedit mit http GET, nicht POST!!!!
    header("Location: press");
}
$link = $sql_con or die("Error " . mysqli_error($link));


//Übergibt den Wert der Postvariablen an die Session, da über die Sessionvariable der Dateninhalt gesteuer wird
if (isset($_POST['dataMark'])) {
    $_SESSION['dataMark'] = $_POST["dataMark"];
}

$_SESSION['pageNumber'] = 0;
$_SESSION['pageSize'] = 100;

$table = 'news';
$tableID = 'datum';

// Idee für die Zukunft, die Spaltennamen werden in ein array geschrieben und der Funktion übergeben so dass sich
// die Funktion automatisch auf jede Tabelle universell anwenden lässt. es muss dann nur noch die Abfrage für die
// Tabelle editiert werden.
//echo $_SESSION['themeID'];
//echo $_SESSION['pageNumber'];
//echo $_SESSION['pageSize'];
//echo $_SESSION['pressID'];

    $query = "SELECT * ";
    $query .= "FROM " . $table . " ";
    $query .= "ORDER BY " . $tableID . " DESC ";
    $query .= "LIMIT " . $_SESSION['pageSize'] . " ";
    $query .= "OFFSET " . $_SESSION['pageNumber'] . "";

    //execute the query.
    $news = $link->query($query) or die("Fehler in der Anfrage Press.." . mysqli_error($link));
    $news->fetch_all(MYSQLI_ASSOC);


unset($_SESSION['pageNumber']);
unset($_SESSION['pageSize']);
?>
