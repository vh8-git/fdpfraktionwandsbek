                <section id="stage" class="stgLogin">
                    <div>
                        <h2>Login</h2>
                        <?php if( isset($error) && is_array($error) && count($error) > 0): foreach( $error as $output ): ?>
                        <div class="errormessage"><?php echo $output; ?></div>
                        <?php endforeach; endif; ?>
                        <form action="<?php echo createUrl(['page' => 'login'])?>" method="post">
                            <span>Benutzername oder Mailadresse:</span>
                            <input name="userName" class="stgLogin" type="text" <?php
                                if (isset($_POST["userName"])) { 
                                echo 'value="' . $_POST["userName"] . '" '; 
                                } ?>placeholder="WEBmaster" autofocus/>
                            <span>Passwort:</span>
                            <input name="userPassword" class="stgLogin" type="password" <?php
                                if (isset($_POST["userPassword"])) { 
                                echo 'value="' . $_POST["userPassword"] . '" '; 
                                } ?>placeholder="Passwort">
                            <input name="stgLogin_submitted" type="hidden" value="1">
                            <?php if( isset($error) && is_array($error) && count($error) > 0): ?>
                            <p></p>
                            <?php else : ?>
                                <p class="stgLogin">Der Login ist nur für den WEBmaster erforderlich.<br>Alle Inhalte dieser Internetpräsenz sind frei zugänglich.</p>
                            <?php endif; ?>

                            <button class="save button cmb50" type="submit">Login</button>
                            <button class="button btnHome cmb50">Zurück zur Startseite</button>
                        </form>
                    </div>
                </section>