<?php    
// Funktion: zum Ausloggen und eine Weiterleitung (auf login)
function logout () {
// Session-Array leeren
    unset($_SESSION['user']);
    unset($_SESSION['login']);
// Zerstören der Session
    session_destroy();

}