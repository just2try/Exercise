<!-- ############## Login Check ############## -->

<?php
    
    require_once 'config.inc.php';
    require_once 'functions.inc.php';

    /* Zugang über "submit" Button? wenn nicht lade index.php */
    if(isset($_POST['submit'])){

        /* Variablen definieren -> verknüpfen mit Eingabefelder aus Login Formular + "Grundreinigen" */
        $username = cleanInput($_POST['uid']);
        $pwd = cleanInput($_POST['pwd']);

        /* "Error handling" / Eingabe Validierung */
        if (emptyInputLogin($username, $pwd) !== false) {
            header("location:" . $_SERVER['url'] . "index.php?page=login&error=emptyinput");
            exit();
        }
        
        if (invalidUid($username) !== false) {
            header("location:" . $_SERVER['url'] . "index.php?page=login&error=invaliduid");
            exit();
        }
    
        loginUser($conn, $username, $pwd);
    }
    else {
        header("location:" . $_SERVER['url'] . "index.php?page=home");
        exit();
    }