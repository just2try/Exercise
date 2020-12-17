<?php



/* Funktion zur "Grundreinigung" der eingegebenen Daten 
Umlaute Email-veträglich umschreiben, unzulässige Leerzeichen entfernen und keinen HTML-Code erlauben sowie keine Seitennamen/Webseiten*/
function cleanInput($input){
	// Wenn Feld nicht leer, dann Grundreinigung
	if(!empty($input)){
	// Umlaut und Sonderzeichen umschreiben
        $input = htmlentities($input);
	// Leerzeichen, die nicht zulässig sind wegnehmen/trimmen
        $input = trim($input);
	// HTML-Code untersagen http-Angaben bezüglich der Verwendung von Slash-Zeichen
        $input = stripslashes($input);
	}
	// Felder für die Weiterverarbeitung dann in bereinigter Form zurückgeben
	return $input;
}

//*######################### Signup Functions ######################### */

/* Funktion zur Prüfung, ob ein Eingabefeld leer ist */
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
    $result; 
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

/* Funktion zur Prüfung, ob der Username mind. 2 der folgenden Zeichen [0-9A-Za-z!@#$%*] hat */
function invalidUid($username){
    $result; 
    if (!preg_match('/^[0-9A-Za-z!@#$%*]{2,}$/', $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

/* Funktion zur Prüfung, ob die Email-Adresse valide ist */
function invalidEmail($email){
    $result; 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {               // filter_var( .. , FILTER_VALIDATE_EMAIL) wendet Email Filter auf Variable an und prüft auf eine valide Mail Adresse 
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

/* Funktion zur Prüfung, ob Password und PasswordRepeat übereinstimmen */
function pwdMatch($pwd, $pwdRepeat){
    $result; 
    if ($pwd !== $pwdRepeat) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

/* Funktion zur Prüfung, ob die Username + Email-Adresse bereits vorhanden sind */
function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM USERS WHERE usersUid = ? OR usersEmail =  ?"; 
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:" . $_SERVER['url'] . "index.php?page=signup&error=stmtfailedUsex");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

/* Funktion zur Erstellung des neuen Users in der Datenbank */
function createUser($conn, $name, $email, $username, $pwd){
    $sql = "INSERT INTO USERS (`usersName`, `usersEmail`, `usersUid`, `usersPwd`)
            VALUES (?,?,?,?)";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:" . $_SERVER['url'] . "index.php?page=signup&error=stmtfailedcrUs");
        // header("location: ../pages/signup.php?error=stmtfailedcrUs");
        exit();
    }

    /* Verschlüsselt das Password mit Arong2I Algorithmus */
    $hashedPwd = password_hash($pwd, PASSWORD_ARGON2I);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location:" . $_SERVER['url'] . "index.php?page=login&error=none");
    // header("location: ../pages/signedup.php?error=none");

}

//*######################### Login Functions ######################### */


function emptyInputLogin($username, $pwd){
    $result; 
    if (empty($username) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd){
    /* Alle in der Datenbank gespeicherten Daten des Users holen -> multiass. array */
    $uidExists = uidExists($conn, $username, $username);           /* $username steht für Uid und Email --> returns true or false */

    if ($uidExists === false ) {
        header("location:" . $_SERVER['url'] . "index.php?page=login&error=wronglogin1");
        exit();
    }

    /* gespeichertes Passwort aus der Datenbank holen */
    $pwdHashed = $uidExists["usersPwd"];        // Spaltenname in der Datenbank
    /* eingegebenes Passwort mit gespeichertem Hash-Passwort abgleichen */
    $checkPwd = password_verify($pwd, $pwdHashed);        // true oder false wird returned

    /* Prüfung: Wenn Passwort falsch ist, lade index.php page login mit error massage   */
    if ($checkPwd === false ) {
        header("location:" . $_SERVER['url'] . "index.php?page=login&error=wronglogin2");
        exit();
    }
    /* Prüfung: Wenn Passwort richtig ist, starte SESSION  und lade index.php page "home"*/
    elseif ($checkPwd === true) {
        session_start();
        $_SESSION['userid'] = $uidExists['usersId'];
        $_SESSION['useruid'] = $uidExists['usersUid'];
        header("location:" . $_SERVER['url'] . "index.php?page=home");
        exit();
    }
    
}