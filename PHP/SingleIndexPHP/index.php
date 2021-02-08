<?php

// ##### Configuration #####--------------------------------------------------------------------------------------------------------------

// SESSION START
    session_start();


// Include Basics

include_once 'inc/config.inc.php';
    /*
    -> config (db connection) 
    -> Funktionen
    -> Filter */

// force HTTPS-connection?`

// Redirect?

// Check for Cookie Acceptance

// ##### HTML DOC Start #####---------------------------------------------------------------------------------------------------------------

echo '
    <!DOCTYPE html>
    <html class="no-js" lang="de">
';

// HTML Head include
    
include 'inc/head.inc.php';

// lade JS Bibliotheken
include 'inc/js.library.inc.php';

// HTML Body Start

echo '<body>'; 

// lade Seiten-Header / Nav-Menü

include_once 'inc/header.inc.php';

// lade Seiten-Content
echo '<main id="content" class="">';

//Standard Seite bei Error
$page = 'pages/404.php';
$p = "";

    // Abfrage/Prüfung ob und welche 'page' geladen werden soll
    if (isset($_GET['page'])){
        $p = $_GET['page'];

        if ($p == '' || $p == 'home'){
            $page = 'pages/home.php';
        }
        elseif ($p == 'gallery'){
            $page = 'pages/gallery.php';
        }
        elseif ($p == 'contact'){
            $page = 'pages/contact.php';
        }
        elseif($p == 'login'){
            $page = 'pages/login.php';
        }
        elseif($p == 'signup'){
            $page = 'pages/signup.php';
        }
        elseif($p == 'profil'){
            $page = 'pages/profil.php';
        }
        elseif($p == 'logout'){
            echo '<script>alert("You have successfully loged out.")</script>';
            $page = 'pages/home.php';
        }
    }
    else {
        $page = 'pages/home.php';
    }

// Inhalts Seite laden
include_once  $page;

echo '</main>';

// lade Seiten-Footer

include 'inc/footer.inc.php';

// lade Scripte
include 'inc/script.inc.php';

// #### HTML DOC Ende #####---------------------------------------------------------------------------------------------------------------

echo '</body>
</html>';

?>