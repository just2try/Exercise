<!-- - Bereitstellung des Login Overlay Modules in HTML
     - links und src Pfade mit Hilfe von PHP 
     - "click" Events mittels inline JavaScript
 -->

<div id="login" class="login-window">
    
  <form class="login-body animate" action="<?php echo $_SERVER['url'] . './inc/login_check.php';?>" method="post">
        <div class="login-head">
            <span class="close"  title="Close Login">&times;</span>
            <img class="avatar" src="<?php echo $_SERVER['url']?>img/avatar2.png" alt="Avatar">
        </div>

        <div class="login-main">
            <label for="uid"><b>Username / E-Mail</b></label>
            <input type="text" placeholder="Enter Username / E-Mail" name="uid"> <!-- required> -->

            <label for="pwd"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="pwd"> <!-- required> -->
                
            <button class="loginbtn main" type="submit" name="submit">Login</button>

            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div class="login-footer">
            <!-- eigene JS Funktionen über 'functionen.js' eingebunden -->
            <!-- Login-Fenster schließen mit inline JS  -->
            <button class="cancelbtn" type="button" onclick="document.getElementById('login').style.display='none'" >Cancel</button>
            
            <!-- Sign-Up-Fenster mit zeigen
                Funktion "show_signup" in function.js definiert -->
            <button class="signbtn footer" type="button" onclick="show_signup()">Sign-up</button>
            <span class="pwd">Forgot <a href="#">password?</a></span>
        </div>
  </form>
</div>