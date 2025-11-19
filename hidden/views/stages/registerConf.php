
                <?php var_dump($_GET['userRegCode']);?>
                <section id="stage" class="register">
                    <div>
                        <h2>Registrierungsbestätigung & Login</h2>
                        <?php if( isset($error) && is_array($error) && count($error) > 0): foreach( $error as $output ): ?>
                        <div class="errormessage"><?php echo $output; ?></div>
                        <?php endforeach; endif; ?>
                        <form action="<?php echo createUrl(['page' => 'registerConf'])?>" method="post">
                            <span>Benutzername:</span>
                            <input name="userName" class="stgLogin" type="text" <?php
                                if (isset($_POST["userName"])) { 
                                echo 'value="' . $_POST["userName"] . '" '; 
                                } ?>placeholder="Benutzername oder Mailadresse angeben"/>
                            <span>Passwort:</span>
                            <input name="userPassword" class="stgLogin" type="password" <?php
                                if (isset($_POST["userPassword"])) { 
                                echo 'value="' . $_POST["userPassword"] . '" '; 
                                } ?>placeholder="Passwort eingeben">
                            <input name="stgLogin_submitted" type="hidden" value="1">
                            <?php if( isset($error) && is_array($error) && count($error) > 0): ?>
                            <p></p>
                            <?php else : ?>
                            <?php endif; ?>
                            <input name="registerConf_submitted" type="hidden" value="1">
                            <input name="hidUserRegCode" type="hidden" value="<?php if (isset($_GET['userRegCode'])) { echo $_GET['userRegCode']; }?>">
                            <button class="save button" type="submit">Ja, ich will die Registrierung abschließen</button>
                            <button id="home" class="home button">Zurück zur Startseite</button>
                        </form>
                    </div>
                </section>   
