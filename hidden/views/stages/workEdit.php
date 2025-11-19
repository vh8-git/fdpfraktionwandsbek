
                <div id="stage">
                    <div>
                        <div class="stoererbackgroundEdit">
                            <form action="<?php echo createUrl(['page' => 'workedit'])?>" method="post">
                                <div class="formelemente">
                                    <button name="dataMark" class="previousstoerer cmsbutton cmb25" type="submit" value="5"></button>
                                    <button name="dataMark" class="newstoerer cmsbutton cmb25" type="submit" value="1"></button>
                                    <button name="dataMark" class="copystoerer cmsbutton cmb25" type="submit" value="2"></button>
                                    <button name="dataMark" class="nextstoerer cmsbutton cmb25" type="submit" value="7"></button>
                                </div>
                                <?php foreach ($row as $key => $value) : ?>
                                    <p>
                                        <span><?php echo $key ?>:</span>
                                        <input id="<?php echo $key ?>"
                                               name="<?php echo $key ?>"
                                                    <?php switch($key) {
                                                        case "stoererID": echo 'onfocus="this.blur()"'; break;
                                                        case "aktiv": echo 'type="checkbox" class="inputcb"'; break;
                                                        default: ""; break;}?>
                                               value="<?php echo $value ?>"<?php if ($row["aktiv"] == "ja"){echo " checked";}?>/>
                                    </p>
                                <?php endforeach; ?>
                                <button name="dataMark" class="savestoerer cmsbutton cmb100" type="submit" value="3"></button>
                            </form>
                        </div>
                    </div>
                        <p class="stagefooterspace"></p>
                </div>