<?php
if(sizeof($_POST) > 0){
    // Wenn alles gut war, leite den benutzer zurück auf workedit mit http GET, nicht POST!!!!
    header("Location: pressedit");
}
    $link = $sql_con or die("Error " . mysqli_error($link));

    $sql = "select count(*) as anzahl from press";
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
$table = 'press';
$tableID = 'pressID';


    // Idee für die Zukunft, die Spaltennamen werden in ein array geschrieben und der Funktion übergeben so dass sich
    // die Funktion automatisch auf jede Tabelle universell anwenden lässt. es muss dann nur noch die Abfrage für die
    // Tabelle editiert werden.
if (isset($_SESSION["dataMark"]) && $_SESSION['dataMark'] == 0) {
    echo "load";
    $query = "SELECT * FROM press ORDER BY $tableID DESC LIMIT 1 OFFSET $pageNumber";

    //execute the query.
    $result = $link->query($query) or die("Fehler in der Anfrage Pressedit.." . mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    $_SESSION['pressID'] = $data['anzahl'] - $pageNumber;


    echo "PN" . $_SESSION['pageNumber'];
    echo "PS" . $_SESSION['pageSize'];
    echo "PID" . $_SESSION['pressID'];

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
        $query = "UPDATE press SET Datum = '$_POST[Datum]', PDFlink = '$_POST[PDFlink]', Titel = '$_POST[Titel]', TextA1 = '$_POST[TextA1]', TextA2 = '$_POST[TextA2]', TextA3 = '$_POST[TextA3]', TextA4 = '$_POST[TextA4]', TextA5 = '$_POST[TextA5]', TextA6 = '$_POST[TextA6]', Bildtext = '$_POST[Bildtext]', Bildname = '$_POST[Bildname]' WHERE press . pressID = " . $_SESSION['pressID'] . "";

        //execute the query
        $result = $link->query($query) or die("Error in the consult.." . mysqli_error($link));

        $_SESSION["info"] = "Erfolgreich geändert!";


    }
    //Neuer Datensatz
    if (isset($_SESSION["dataMark"]) && $_SESSION['dataMark'] == 1) {

        $query = "INSERT INTO press (pressID, Datum, PDFlink, Titel, TextA1, TextA2, TextA3, TextA4, TextA5, TextA6, Bildtext, Bildname) VALUES ('', '', '', '', '', '', '', '', '', '', '', '')";

        $result = $link->query($query) or die("Fehler in der Anfrage.." . mysqli_error($link));

        $_SESSION['pageNumber'] = 0;
    }

    //Kopie des Datensatzes
    if (isset($_SESSION["dataMark"]) && $_SESSION['dataMark'] == 2) {

        $query = "INSERT INTO press (pressID, Datum, PDFlink, Titel, TextA1, TextA2, TextA3, TextA4, TextA5, TextA6, Bildtext, Bildname) VALUES ('', '" . $_POST['Datum'] ."', '" . $_POST['PDFlink'] ."', '" . $_POST['Titel'] ."', '" . $_POST['TextA1'] ."', '" . $_POST['TextA2'] ."', '" . $_POST['TextA3'] ."', '" . $_POST['TextA4'] ."', '" . $_POST['TextA5'] ."', '" . $_POST['TextA6'] ."', '" . $_POST['Bildtext'] ."', '" . $_POST['Bildname'] ."')";

        $result = $link->query($query) or die("Fehler in der Copyzugriff.." . mysqli_error($link));

        $_SESSION['pageNumber'] = 0;
    }

$_SESSION['dataMark'] = 0;

?>
