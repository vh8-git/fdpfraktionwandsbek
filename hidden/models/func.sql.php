<?php

function sql_connect() {

    $cfg['host']     = '';               // MySQL hostname or IP address
    $cfg['user']     = 'FDPadmin';         // MySQL port - leave blank for default port
    $cfg['password'] = 'Fdp!6417#';       // How to connect to MySQL server ('tcp' or 'socket')
    $cfg['database'] = 'sk34-200313-1_WEBsite';         // Path to the socket - leave blank for default socket
    $link = mysqli_connect($cfg['host'] , $cfg['user'] , $cfg['password'] , $cfg['database'] );

    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    //printf("Initial character set: %s\n", mysqli_character_set_name($link));

    /* change character set to utf8 */
    if (!mysqli_set_charset($link, "utf8")) {
        printf("Error loading character set utf8: %s\n", mysqli_error($link));
        exit();
    } else {
        //printf("Current character set: %s\n", mysqli_character_set_name($link));
    }

    return $link;
}