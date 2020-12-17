<!-- ############## Signup Check ############## -->

<?php
    
    require_once 'config.inc.php';
    require_once 'functions.inc.php';

/* Zugang über "submit" Button? wenn nicht lade index.php */
if(isset($_POST['submit'])){
    
/* Variablen definieren -> verknüpfen mit Eingabefelder aus Signup Formular + "Grundreinigen" */
    $name = cleanInput($_POST['name']);
    $email = cleanInput($_POST['email']);
    $username = cleanInput($_POST['uid']);
    $pwd = cleanInput($_POST['pwd']);
    $pwdRepeat = cleanInput($_POST['pwdrepeat']);

 /* "Error handling" / Eingabe Validierung */
    if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false) {
        header("location:" . $_SERVER['url'] . "index.php?page=signup&error=emptyinput");
        exit();
    }
    
    if (invalidUid($username) !== false) {
        header("location:" . $_SERVER['url'] . "index.php?page=signup&error=invaliduid");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location:" . $_SERVER['url'] . "index.php?page=signup&error=invalidemail");
        exit();
    }
    
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location:" . $_SERVER['url'] . "index.php?page=signup&error=passwordnotmatch");
        exit();
    }
    
    if (uidExists($conn, $username, $email) !== false) {
        header("location:" . $_SERVER['url'] . "index.php?page=signup&error=uidalreadyexists");
        exit();
    }

    createUser($conn, $name, $email, $username, $pwd);

}
else {
    header("location:" . $_SERVER['url'] . "index.php?page=home");
    exit();
}