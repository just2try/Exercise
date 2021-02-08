<div class="button-wrapper">
    <h1>Contact</h1>
</div>
            
<section class="contact">
        <div class="form">

            <p class="form">Bitte füllen Sie das Kontakt-Formular komplett aus und senden es anschließend ab.</p>
        
            <!-- Formular Start -->

                        <!-- $_SERVER ["PHP_SELF"] sendet also die übermittelten Formulardaten an die Seite
                        selbst, anstatt zu einer anderen Seite zu springen. Auf diese Weise erhält der
                        Benutzer Fehlermeldungen auf derselben Seite wie das Formular.-->
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?page=contact"); ?>" autocomplete="off">                    
                    <fieldset>
                            <fieldset>      <!-- Gruppierung der zusammengehöriegen Felder -->
                                <legend>Personalien:</legend>
                                <p class="form">
                                    <label for="gender">Anrede:</label>
                                    <select name="gender">
                                        <option selected="selected" value="Herr">Herr</option>
                                        <option value="Frau">Frau</option>
                                        <option value="Dr.">Dr.</option>
                                        <option value="Prof.">Prof.</option>
                                        <option value="Prof. Dr.">Prof. Dr.</option>
                                    </select>
                                </p>
                                <p class="form">
                                    <label for="fname">* Vorname:</label>
                                    <input type="text" name="firstname" id="fname" placeholder="" class="form-field" required>      <!--mit name-Attribut werden Daten nach Übermittlung identifiziert -->
                                </p>
                                <p class="form">
                                    <label for="name">* Nachname:</label>
                                    <input type="text" name="name" id="name" placeholder="" class="form-field" required>      
                                </p>
                                <p class="form">
                                    <label for="bday">Geburtsdatum:</label>
                                    <input type="date" name="bday" id="bday" class="form-field">
                                    <label for="age">Alter:</label>
                                    <input max="150" min="1" name="age" step="1" type="number" value="18" class="form-field">                                   
                                </p>
                            </fieldset>
                        <br>
                            <fieldset>
                                <legend>Adresse:</legend>
                                <p class="form">
                                    <label for="street">Straße + Nr.:</label>
                                    <input type="text" name="street" id="street" placeholder="" class="form-field">   
                                </p>
                                <p class="form">
                                    <label for="postcode">PLZ:</label>
                                    <!-- mit "pattern" Vorgabe für die Eingabe bestimmen (Zahlen von 0-9 max 5) und mit "title" eine Beschreibung für User hinzufügen -->
                                    <input type="text" name="postcode" id="postcode" placeholder="" maxlength="5" pattern="[0-9]{5}" title="0-9 max 5 Zeichen" class="form-field">   
                                </p>
                                <p class="form">
                                    <label for="place">Ort:</label>
                                    <input type="text" name="place" id="place" placeholder="" class="form-field">   
                                </p>
                            </fieldset>
                        <br>
                            <fieldset>
                                <legend>Kontaktdaten:</legend>
                                <p class="form">
                                    <label for="email">* Email Addresse:</label>
                                    <input type="email" name="email" id="email" placeholder="" class="form-field" required>
                                </p>
                                <p class="form"> 
                                    <label for="phone">Telefon:</label>
                                    <input type="tel" name="phone" id="phone" placeholder="" class="form-field">
                                </p>
                            </fieldset>
                        
                            <p>Newsletter zusenden:
                                <input type="radio" id="y_news" name="news" value="yes">
                                <label for="y_news">ja</label>
                                <input type="radio" id="n_news" name="news" value="no" checked>
                                <label for="n_news">nein</label>
                            </p>
                            <p class="form">
                                <label for="massage">Massage:</label>
                                <textarea name="massage" id="massage" cols="30" rows="10" class="form-field" style="resize: none;"></textarea>
                            </p>
                            <p class="form"><a href="#">§ Allgemeine Geschäftsbedingungen & Datenschutzrichtlinien</a></p>
                            <!--Pflichtfeld mit "required"-Attribut bestimmten -->
                            <label><input name="terms" type="checkbox" value="read_&_except" required>* AGB's gelesen und akzeptiert</label>

                            <p class="form">
                                <button type="submit" id="btn-submit">Absenden</button>
                                <button type="reset" id="btn-reset">Zurücksetzen</button>
                            </p>
                            <small>* Pflichtfelder</small>
                    </fieldset>
                </form>
                <!-- Formular Ende -->
        </div>

        <div class="maps">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d155422.33267293015!2d13.284650578060933!3d52.506761402291886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47a84e373f035901%3A0x42120465b5e3b70!2sBerlin!5e0!3m2!1sde!2sde!4v1611214048478!5m2!1sde!2sde"
                width="600"
                height="450"
                frameborder="0"
                style="border:0;"
                allowfullscreen=""
                aria-hidden="false"
                tabindex="0">
            </iframe>

            <?php

                /* $_SERVER['SERVER_NAME'] -> Superglobal, die den Request-Methode zurückgibt, die genutz wurde um die Seite zu erreichen
                    Prüfung, ob Request-Methode = Post ist
                */
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    
                    /*Formular Eingaben in Variablen speichern*/
                    /* Mit "$_POST['.....']" kann man auf die jeweiligen Namen aus dem HTML Document zugreifen */
                    $gender = $_POST['gender'];
                    $firstname = $_POST["firstname"];
                    $name = $_POST["name"];
                    $street = $_POST["street"];
                    $postcode = $_POST["postcode"];
                    $place = $_POST["place"];
                    $bday = $_POST["bday"];
                    $age = $_POST["age"];
                    $email = $_POST["email"];
                    $phone = $_POST["phone"];
                    $news = $_POST["news"];
                    $massage = $_POST["massage"];
                    $terms = $_POST["terms"];
                    
                    echo "<div class='form'>
                            <p>Guten Tag, $gender $firstname $name</p><br>
                    
                            <p>Folgende Daten wurden erfolgreich übermittelt: </p><br>
                            <fieldset>
                                <p class='form'>Name: <span class='orange'> $gender $firstname $name </span></p>
                                <p class='form'>Adresse: <span class='orange'> $street, $postcode $place </span></p>
                                <p class='form'>Geburtsdatum: <span class='orange'> $bday </span></p>
                                <p class='form'>Alter: <span class='orange'> $age</span></p>
                                <p class='form'>Kontaktdaten: <span class='orange'> $email / $phone </span></p>
                                <p class='form'>Newsletter abboniert?: <span class='orange'> $news </span></p>
                                <p class='form'>Ihre Nachricht an uns: <span class='orange'> $massage </span></p>
                                <p class='form'>AGB's gelesen und bestätigt?: <span class='orange'> $terms </span></p>
                            </fieldset>
                            
                            <p style='color: red; margin: 10px;'>Danke für Ihre Zusendung! </p>
                
                        </div>";
                }         


            ?>



        </div>

</section>


