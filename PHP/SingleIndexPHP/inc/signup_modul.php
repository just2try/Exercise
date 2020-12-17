<!-- - Bereitstellung des Signup Overlay Modules in HTML
     - links und src Pfade mit Hilfe von PHP 
     - "click" Events mittels inline JavaScript
 -->

<div id="signup" class="signup-window">

    <form class="signup-body animate" action="<?php echo $_SERVER['url'] . 'inc/signup_check.php'; ?>" method="post">
        <div class="signup-head">
            <span class="close"  title="Close Login">&times;</span>
            <img class="avatar" src="<?php echo $_SERVER['url']?>img/avatar2.png" alt="Avatar">
        </div>

        <div class="signup-main">
            <label for="name"><b>Name*</b></label>
            <input type="text" name="name" placeholder="Enter Full Name"> <!-- required> -->

            <label for="email"><b>E-Mail Adress*</b></label>
            <input type="email" name="email" placeholder="Enter E-Mail"> <!-- required> -->

            <label for="uid"><b>Username*</b></label>
            <input type="text" name="uid" placeholder="Enter Username"> <!-- required> -->

            <label for="pwd"><b>Password*</b></label>
            <input type="password" name="pwd" placeholder="Enter Password (mind. 6)"> <!-- required> -->
            <input type="password" name="pwdrepeat" placeholder="Repeat Password"><!--  required> -->

            <small>*required</small>

            <button class="signbtn main" type="submit" name="submit">Sign-Up</button>
        </div>

        <div class="signup-footer">
            <!-- eigene JS Funktionen über 'functionen.js' eingebunden -->
            <!-- Sign-Up-Fenster mit inline jquery schließen -->
            <button class="cancelbtn" type="button" onclick="$('#signup').hide()">Cancel</button>

            <!-- Sign-Up-Fenster schließen u. Login-Fenster öffnen
                 Funktion "show_login" in function.js definiert-->
            <button class="loginbtn footer" type="button" onclick="show_login()">Login</button>           

        </div>
    </form>
</div>