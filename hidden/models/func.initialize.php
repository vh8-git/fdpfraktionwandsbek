<?php

function SESSION_initialize(){
    if (!isset($_SESSION['dataMark'])) {
        $_SESSION['dataMark'] = 0;
    }
}
