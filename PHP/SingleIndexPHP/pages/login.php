
<!-- Inline Styly "Display: block" um Modul anzuzeigen -->
<div id="login" class="login-window" style="display: block;">
    
    <form class="login-body animate" action="<?php echo $_SERVER['url'] . 'inc/login_check.php';?>" method="post">
          <div class="login-head">
          <a href="<?php echo $_SERVER['url'] . 'index.php?page=home'; ?>"><span class="close"  title="Close Login">&times;</span></a>
              <img class="avatar" src="<?php echo $_SERVER['url']?>img/avatar2.png" alt="Avatar">
          </div>
  
          <div class="login-main">
              <label for="uid"><b>Username / E-Mail</b></label>
              <input type="text" placeholder="Enter Username / E-Mail" name="uid"> <!-- required> -->
  
              <label for="pwd"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="pwd"><!--  required> -->
                  
              <button class="loginbtn main" type="submit" name="submit">Login</button>
  
              <label>
                  <input type="checkbox" checked="checked" name="remember"> Remember me
              </label>
          </div>
  
          <div class="login-footer">
              <!-- neue Seite (index.php -> home) laden mit inline JS -->
              <button class="cancelbtn" type="button" onclick="window.location.assign('index.php?page=home')">Cancel</button>
              <!-- neue Seite (index.php -> signup) laden mit inline JS -->
              <button class="loginbtn footer" type="button" onclick="window.location.assign('index.php?page=signup')">Sign-up</button>
              <span class="pwd">Forgot <a href="#">password?</a></span>
          </div>

              <?php
                /* Error Handling --> Fehlermeldungen ausgeben, wenn fehlerhafte Eingaben gemacht wurden (siehe login_check.php)*/
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'emptyinput') {
                        echo '<div class="login-footer error"><p>You missed some fields. Please fill out all fields!</p></div>';
                    }
                    elseif ($_GET['error'] == 'wronglogin1') {
                        echo '<div class="login-footer error"><p>Username don\'t exists. Please try again!</p></div>';
                    }
                    elseif ($_GET['error'] == 'wronglogin2') {
                        echo '<div class="login-footer error"><p>Password is wrong. Please try again!</p></div>';
                    }
                    elseif ($_GET['error'] == 'none'){
                        echo '<div class="login-footer error"><p class="error">You have successfully signed up!</p></div>';
                    }
                }
              ?>
    </form>
  </div>
  
  <script>
      $('span.close').click(function(){                           //? funktioniert nur bei direkt-Einbindung in Datei
          window.location.assign('index.php?page=home');
      });
  </script>



