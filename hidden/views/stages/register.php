
                <section id="stage" class="register">
                    <div>
                        <h2>Registrierung</h2>
                            <div class="errormessage">
                                <?php if( isset($output) && is_array($output) ): foreach( $output as $error ): ?>
                                    <p>
                                        <?php echo $error; ?>
                                    </p>
                                <?php endforeach; elseif( isset($output) && is_string($output) ) : ?>
                                    <div class="fullScreenLayer"><div class="messageBoxFullscreen"><?php echo $output; ?></div></div>
                                <?php endif; ?>
                            </div>
                        <form id="register" action="<?php echo createUrl(['page' => 'register']); ?>" method="post">
                            <p>
                                <span>Benutzername:</span><i>(Optional und kann für den Login anstelle der Mailadresse verwendet werden.)</i>
                                <input name="Benutzername" <?php
                                if (isset($_POST["Benutzername"])) { 
                                echo 'value="' . $_POST["Benutzername"] . '" '; 
                                } ?> placeholder="Wähle einen Benutzernamen von mindestens 6 Buchstaben Länge."/>
                                <div id="checkUsername" Class="result"></div>
                            </p>
                            <p>
                                <span>Passwort:*</span><i>(Min. ein Klein-, ein Großbuchstabe, ein Sonderzeichen, eine Ziffer und 6 Zeichen, max. 12 Zeichen.)</i>
                                <input name="clearPasswort" type="password" <?php
                                if (isset($_POST["clearPasswort"])) { 
                                echo 'value="' . $_POST["clearPasswort"] . '" '; 
                                } ?> placeholder="Gib ein Password ein."/>
                                <div id="checkPassword" Class="result"></div>
                            </p>
                            <p>
                                <span>Passwortwiederholung:*</span>
                                <input name="clearPasswortWiederholung" type="password" <?php
                                if (isset($_POST["clearPasswortWiederholung"])) { 
                                echo 'value="' . $_POST["clearPasswortWiederholung"] . '" '; 
                                } ?> placeholder="Wiederhole das Password."/>
                                <div id="checkPasswordWD" Class="result"></div>
                            </p>
                            <p>
                                <span>Email:*</span>
                                <input id="Email" name="Email" <?php
                                if (isset($_POST["Email"])) { 
                                echo 'value="' . $_POST["Email"] . '" '; 
                                } ?> placeholder="Bitte gib eine gültige Mailadresse an."/>
                                <div id="checkEmail" Class="result"></div>
                            </p>
                            <p>
                                <span>Nachname:</span>
                                <input name="Nachname" type="" <?php
                                if (isset($_POST["Nachname"])) { 
                                echo 'value="' . $_POST["Nachname"] . '" '; 
                                } ?> placeholder="Bitte gib deinen Nachnamen an."/>
                            </p>
                            <p>
                                <span>Vorname:</span>
                                <input name="Vorname" type="" <?php
                                if (isset($_POST["Vorname"])) { 
                                echo 'value="' . $_POST["Vorname"] . '" '; 
                                } ?> placeholder="Bitte gib deinen Vornamen an."/>
                            </p>
                            <p>
                                <span>Mobil:</span>
                                <input name="Mobil" type="" <?php
                                if (isset($_POST["Mobil"])) { 
                                echo 'value="' . $_POST["Mobil"] . '" '; 
                                } ?> placeholder="Bitte gib deine Mobil-Telefonnummer an."/>
                            </p>
                            <p>* Pflichtangaben, damit eine Registrierung möglich ist.</p>
                            <input name="register_submitted" type="hidden" value="1">
                            <button class="save button" type="submit">registrieren</button>
                            <button id="home" class="home button">Zurück zur Startseite</button>
                        </form>
                    </div>
                </section>                