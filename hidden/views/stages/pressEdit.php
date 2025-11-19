<div id="stage" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
     xmlns="http://www.w3.org/1999/html">
                    <div>
                        <div class="stoererbackgroundEdit">
                            <form action="<?php echo createUrl(['page' => 'pressedit'])?>" method="post">
                                <div class="formelemente">
                                    <button name="dataMark" class="previouspress cmsbutton cmb25" type="submit" value="7"></button>
                                    <button name="dataMark" class="newpress cmsbutton cmb25" type="submit" value="1"></button>
                                    <button name="dataMark" class="copypress cmsbutton cmb25" type="submit" value="2"></button>
                                    <button name="dataMark" class="nextpress cmsbutton cmb25" type="submit" value="5"></button>
                                    <button name="dataMark" class="savestoerer cmsbutton cmb100" type="submit" value="3"></button>
                                </div>
                                <?php foreach ($row as $key => $value) : ?>
                                    <p>
                                        <span><?php echo $key ?>:</span>
                                        <textarea id="<?php echo $key ?>"
                                                  name="<?php echo $key ?>"
                                                        <?php switch($key) {
                                                        case "pressID": echo 'onfocus="this.blur()"'; break;
                                                        default: ""; break;}?>
                                                        <?php if (strpos($key, 'Text') !== false) {
                                                        echo 'class="text"';}?>><?php echo $value ?></textarea>
                                    </p>
                                <?php endforeach; ?>
                            </form>
                        </div>
                    </div>
                        <p class="stagefooterspace"></p>
                </div>