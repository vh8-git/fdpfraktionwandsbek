
                <section id="stage" class="userInfo">
                    <div>
                        <h2>Benutzerdaten</h2>
                        <form action="<?php echo createUrl(['page' => 'userInfo'])?>" method="post">
                            <?php foreach ($row as $key => $value) : ?>
                            <p>
                                <span><?php echo $key ?>:</span>
                                <input name="<?php echo $key ?>" type="<?php
                                switch($key) {
                                case "Passwort": echo "password"; break;
                                default: "text";
                                }?>" value="<?php echo $value ?>"/>
                            </p>
                            <?php endforeach; ?>
                            <input name="userinfo_submitted" type="hidden" value="1">
                            <button class="save button" type="submit">Änderungen speichern</button>
                            <button class="btnHome home button">Zurück zur Startseite</button>
                            <button class="btnLogout logout button">Logout</button>   
                        </form>
                    </div>
                </section>