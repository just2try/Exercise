<?php
    
    include_once 'config.inc.php';

    session_start();
    session_unset();
    session_destroy();

    header("location:" . $_SERVER['url'] . "index.php?page=logout");
    exit();

