<?php
if(sizeof($_POST) > 0){
    // Wenn alles gut war, leite den benutzer zurück auf workedit mit http GET, nicht POST!!!!
    header("Location: newslettersedit");
}
    $link = $sql_con or die("Error " . mysqli_error($link));

    $sql = "select count(*) as anzahl from news";
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
    $table = 'news';
    $tableID = 'newsID';


    // Idee für die Zukunft, die Spaltennamen werden in ein array geschrieben und der Funktion übergeben so dass sich
    // die Funktion automatisch auf jede Tabelle universell anwenden lässt. es muss dann nur noch die Abfrage für die
    // Tabelle editiert werden.
    if (isset($_SESSION["dataMark"]) && $_SESSION['dataMark'] == 0) {
        $query = "SELECT * FROM news ORDER BY newsID DESC LIMIT 1 OFFSET $pageNumber";

        //execute the query.
        $result = $link->query($query) or die("Fehler in der Anfrage Newsedit.." . mysqli_error($link));
        $row = mysqli_fetch_assoc($result);
        $_SESSION['newsID'] = $data['anzahl'] - $pageNumber;


        echo "load";
//        var_dump($_SESSION);
        echo "PN" . $_SESSION['pageNumber'];
        echo "PS" . $_SESSION['pageSize'];
        echo "PID" . $_SESSION['newsID'];

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
        $query = "UPDATE news SET Datum = '$_POST[Datum]', news_Link = '$_POST[news_Link]', news_Kategorie = '$_POST[news_Kategorie]', news_ersterAbsatz = '$_POST[news_ersterAbsatz]', news_Teasertext = '$_POST[news_Teasertext]', news_TextA1 = '$_POST[news_TextA1]', news_TextA2 = '$_POST[news_TextA2]', news_TextA3 = '$_POST[news_TextA3]', news_TextA4 = '$_POST[news_TextA4]', news_Bildtext = '$_POST[news_Bildtext]', news_Bild = '$_POST[news_Bild]' WHERE news . newsID = " . $_SESSION['newsID'] . "";

        //execute the query
        $result = $link->query($query) or die("Error in the consult.." . mysqli_error($link));

        $_SESSION["info"] = "Erfolgreich geändert!";


    }
    //Neuer Datensatz
    if (isset($_SESSION["dataMark"]) && $_SESSION['dataMark'] == 1) {

        $query = "INSERT INTO news (newsID, Datum, news_Link, news_Kategorie, news_ersterAbsatz, news_Bild, news_Bildtext, news_Teasertext, news_TextA1, news_TextA2, news_TextA3, news_TextA4) VALUES ('', '', '', '', '', '', '', '', '', '', '', '')";

        $result = $link->query($query) or die("Fehler in der Anfrage.." . mysqli_error($link));

        $_SESSION['pageNumber'] = 0;
    }

    //Kopie des Datensatzes
    if (isset($_SESSION["dataMark"]) && $_SESSION['dataMark'] == 2) {

        $query = "INSERT INTO news (newsID, Datum, news_Link, news_Kategorie, news_ersterAbsatz, news_Bild, news_Bildtext, news_Teasertext, news_TextA1, news_TextA2, news_TextA3, news_TextA4) VALUES ('', '" . $_POST['news_date'] ."', '" . $_POST['news_link'] ."', '" . $_POST['news_Kategorie'] ."', '" . $_POST['news_ersterAbsatz'] ."', '" . $_POST['news_Bild'] ."', '" . $_POST['news_Bildtext'] ."', '" . $_POST['news_Teasertext'] ."', '" . $_POST['news_TextA1'] ."', '" . $_POST['news_TextA2'] ."', '" . $_POST['news_TextA3'] ."', '" . $_POST['news_TextA4'] ."')";

        $result = $link->query($query) or die("Fehler in der Copyzugriff.." . mysqli_error($link));

        $_SESSION['pageNumber'] = 0;
    }

$_SESSION['dataMark'] = 0;

?>
