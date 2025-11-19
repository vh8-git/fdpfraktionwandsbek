<?php
//unset $_SESSION["stoererID"];
//$_SESSION["stoererID"] = 1;

$link = $sql_con or die("Error " . mysqli_error($link));

    //consultation:
    $query = "SELECT * ";
    $query .= "FROM stoerer ";
    $query .= "WHERE aktiv = 'ja'";
    //execute the query. 
    $result = $link->query($query) or die("Fehler in der Anfrage Work.." . mysqli_error($link));
    $row = mysqli_fetch_assoc($result);

    $_SESSION['stoererID'] = $row['stoererID'];

    if (isset($_POST['dataMark'])) {
        $_SESSION['dataMark'] = $_POST["dataMark"];
    }

    $_SESSION['newsNumber'] = 0;
    $_SESSION['newssize'] = 3;

$table = 'news';
$tableID = 'Datum';

    $query = "SELECT * ";
    $query .= "FROM " . $table . " ";
    $query .= "ORDER BY " . $tableID . " DESC ";
    $query .= "LIMIT " . $_SESSION['newssize'] . " ";
    $query .= "OFFSET " . $_SESSION['newsNumber'] . "";

    //execute the query.
    $news = $link->query($query) or die("Fehler in der Anfrage Press.." . mysqli_error($link));
    $news->fetch_all(MYSQLI_ASSOC);


    unset($_SESSION['newsNumber']);
    unset($_SESSION['newssize']);
?>
