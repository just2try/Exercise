<header> 
    <nav class="navigation">
        <ul class="menu">

            <!-- Navigations Menü mit Verlinkung auf index.php + page Angabe für -->
            <li class="logo"><a href="<?php echo $_SERVER['url'] . 'index.php?page=home'?>"><img src="img/code-optimization-3-64.png" alt="Code Logo"></a></li>
            <li class="item flip"><a href="<?php echo $_SERVER['url'] . 'index.php?page=home'?>"><span class="icon fas fa-home"></span>Home</a></li>
            <li class="item flip"><a href="<?php echo $_SERVER['url'] . 'index.php?page=gallery'?>"><span class="icon fas fa-images"></span>Gallery</a></li>
            <li class="item flip"><a href="<?php echo $_SERVER['url'] . 'index.php?page=contact'?>"><span class="icon fas fa-file-contract"></span>Contact</a></li>
            <?php
                /* prüfen, ob Session "useruid" existiert (heißt, dass User eingeloggt ist), wenn ja zeige Profil und Logout Button */
                if (isset($_SESSION['useruid'])) {
                    echo '<li class="item flip"><a href="'. $_SERVER['url'] . 'index.php?page=profil' . '"><span class="icon far fa-user"></span>'. $_SESSION['useruid'] .'</a></li>';
                    echo '<li class="item button flip"><a href="'. $_SERVER['url'] . 'inc/logout.inc.php' . '"><span class="icon fas fa-sign-out-alt"></span>Logout</a></li>';
                }
                else {
                    // <!-- Login-Fenster mit inline JS anzeigen lassen -->
                    echo '<li id="jsLoginButton" class="item button flip" style="display:none;"><a onclick="document.getElementById(\'login\').style.display=\'block\'"><span class="icon fas fa-sign-in-alt"></span>Login</a></li>';
                    // <!-- Sign-Up-Fenster mit inline JQuery anzeigen lassen -->
                    echo '<li id="jsSignupButton" class="item button secondary flip" style="display:none;"><a onclick="$(\'#signup\').show()"><span class="icon far fa-user"></span>Sign-up</a></li>';
                
                    // <!-- direkter Link zur Login & Sign-Up Page als "Fallback"-->
                    echo '<noscript class="menu">
                            <li class="item button flip"><a href="index.php?page=login"><span class="icon fas fa-sign-in-alt"></span>Login</a></li>
                            <li class="item button secondary flip"><a href="index.php?page=signup"><span class="icon far fa-user"></span>Sign-up</a></li>
                        </noscript>'; 
                }
            ?>          
            
            <li class="toggle"><a href="#"><span class="bars"></span></a></li>
        </ul>
    </nav>
</header>

<!-- Einbindung des Login und Signup Overlay Moduls -->

<?php
    include_once 'login_modul.php';
    include_once 'signup_modul.php';


/*##  Absichtlich offen lassen (aus Sicherheitsgründen), damit keine weiteren unabsichtlichen Eingaben getätigt werden können.
	  Nur wenn das Dokument danach ausschließlich php Code enthält
?>  
 */ 