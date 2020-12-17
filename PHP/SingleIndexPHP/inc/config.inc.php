<?php

//-----------------------------------------------------------------------------------

//# Localhost Adresse #
//#####################

$_SERVER['url'] = 'http://localhost/PHP/PraxisProjekt/SingleIndexPHP/';

//-----------------------------------------------------------------------------------

//# Serververbindung #
//#####################
            
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SingleIndexProject";

//(MySQLi objektorientiert)

// Verbindung herstellen (zuerst ohne "dbname", da diese DB noch nicht erstellt wurde und nicht existiert)
$conn = new mysqli($servername, $username, $password, $dbname);

// Verbindung prüfen
if ($conn->connect_error) {
    die("<h3>Connection failed:</h3>" . "<p>" . $conn->connect_error . "</p>");
}

// // Datenbank erstellen, wenn diese noch nicht existiert 
// $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

// if ($conn->query($sql) !== TRUE) {
//     echo "Error creating database: " . $conn->error;
// }

 
// $conn->close(); //Die Verbindung wird automatisch geschlossen, wenn das Skript endet. Verwenden Sie Folgendes, um die Verbindung zuvor zu schließen:


// (MySQLi-Prozedur)

/* 
// Create connection
$conn = mysqli_connect($servername, $username, $password);

//  Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully"; 

mysqli_close($conn);   // Die Verbindung wird automatisch geschlossen, wenn das Skript endet. Verwenden Sie Folgendes, um die Verbindung zuvor zu schließen:
 */


/*##  Absichtlich offen lassen (aus Sicherheitsgründen), damit keine weiteren unabsichtlichen Eingaben getätigt werden können.
	  Nur wenn das Dokument danach ausschließlich php Code enthält
?>  
 */ 