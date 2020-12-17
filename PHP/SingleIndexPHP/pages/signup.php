
<!-- Inline Styly "Display: block" um Modul anzuzeigen -->
<div id="signup" class="signup-window" style="display: block;">

    <form class="signup-body animate" action="<?php echo $_SERVER['url'] . 'inc/signup_check.php'; ?>" method="post">
        <div class="signup-head">
            <a href="<?php echo $_SERVER['url'] . 'index.php?page=home'; ?>"><span class="close"  title="Close signup">&times;</span></a>
            <img class="avatar" src="<?php echo $_SERVER['url']?>img/avatar2.png" alt="Avatar">
        </div>

        <div class="signup-main">
            <label for="name"><b>Name*</b></label>
            <input type="text" name="name" placeholder="Enter Full Name"> <!-- required> -->

            <label for="email"><b>E-Mail Adress*</b></label>
            <input type="email" name="mail" placeholder="Enter E-Mail"> <!-- required> -->

            <label for="uid"><b>Username*</b></label>
            <input type="text" name="uid" placeholder="Enter Username"> <!-- required> -->

            <label for="pwd"><b>Password*</b></label>
            <input type="password" name="pwd" placeholder="Enter Password (mind. 6)"> <!-- required> -->
            <input type="password" name="pwdrepeat" placeholder="Repeat Password"> <!-- required> -->

            <small>*required</small>

            <button class="signbtn main" type="submit" name="submit">Sign-Up</button>
        </div>

        <div class="signup-footer">
            <button class="cancelbtn" type="button" onclick="window.location.assign('index.php?page=home')">Cancel</button>

            <?php
                /* Error Handling --> Fehlermeldungen ausgeben, wenn fehlerhafte Eingaben gemacht wurden (siehe signup_check.php)*/
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'emptyinput') {
                        echo '<p class="error">You missed some fields. Please fill out all fields!</p>';
                    }
                    elseif ($_GET['error'] == 'invaliduid') {
                        echo '<p class="error">Your Username is invalid. Only letters a-Z and digits 0-9 are allowed!</p>';
                    }
                    elseif ($_GET['error'] == 'invalidemail') {
                        echo '<p class="error">Your email address is invalid. Please check your input!</p>';
                    }
                    elseif ($_GET['error'] == 'passwordnotmatch') {
                        echo '<p class="error">Password repeat don\'t match. Please check your input!</p>';
                    }
                    elseif ($_GET['error'] == 'uidalreadyexists') {
                        echo '<p class="error">Username / E-Mail already exists. Please choose another one!</p>';
                    }
                    elseif ($_GET['error'] == 'stmtfailedUsex') {
                        echo '<p class="error">Something went wrong while checking Username. Please try again!</p>';
                    }
                    elseif ($_GET['error'] == 'stmtfailedcrUs') {
                        echo '<p class="error">Something went wrong while creating User. Please try again!</p>';
                    }
                }
            ?>
            
            <button class="loginbtn footer" type="button" onclick="window.location.assign('index.php?page=login')">Login</button>

            

        </div>
    </form>
</div>

<script>
      $('span.close').click(function(){                           //? funktioniert nur bei direkt-Einbindung in Datei
          window.location.assign('index.php?page=home');
      });
  </script>