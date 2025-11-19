
                <div id="stage">
                    <div>
                        <div class="stoererbackgroundEdit">
                            <form action="<?php echo createUrl(['page' => 'requestinquiryedit'])?>" method="post">
                                <div class="formelemente">
                                    <button name="dataMark" class="previoustheme cmsbutton cmb25" type="submit" value="7"></button>
                                    <button name="dataMark" class="newtheme cmsbutton cmb25" type="submit" value="1"></button>
                                    <button name="dataMark" class="copytheme cmsbutton cmb25" type="submit" value="2"></button>
                                    <button name="dataMark" class="nexttheme cmsbutton cmb25" type="submit" value="5"></button>
                                </div>
                                <?php foreach ($row as $key => $value) : ?>
                                    <p>
                                        <span><?php echo $key ?>:</span>
                                        <input id="<?php echo $key ?>"
                                               name="<?php echo $key ?>"
                                                    <?php switch($key) {
                                                        case "themeID": echo 'onfocus="this.blur()"'; break;
                                                        case "aktiv": echo 'type="checkbox" class="inputcb"'; break;
                                                        default: ""; break;}?>
                                               value="<?php echo $value ?>"/>
                                    </p>
                                <?php endforeach; ?>
                                <button name="dataMark" class="savestoerer cmsbutton cmb100" type="submit" value="3"></button>
                            </form>
                        </div>
                    </div>
                        <p class="stagefooterspace"></p>
                </div>