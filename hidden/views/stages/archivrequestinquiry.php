

                <div id="stage">
                    <div class="font normal">
                        <div id="theme" class="first theme">
                            <h3 class="marg">Archiv "Unsere Themen im Bezirk und in der Stadt"</h3>
                            <p class="marg">Hier sind unsere "älteren" Themen gelistet.</p>
                            <div>
                                <div class="marg">
                                    <?php if (isset($_SESSION['login'])): ?><span class="btnEditRequestInquiry btnEdit glyphicon glyphicon-pencil"></span><?php endif; ?>
                                    <p><span class="themeDate">Datum</span><span class="themeNR">Drs-Nummer</span><span class="Label"></span><span class="titel Antrag HDL">Titel</span></p>
                                    <?php foreach ($themes as $theme) { ?>
                                        <p><span class="themeDate"><?php $date=date_create($theme['Datum']); echo date_format($date,"d.m.Y");?></span><a target= "_blank" href="<?php echo $theme['Link']?>"><span class="themeNR"><?php echo $theme['DrsNumber']?></span><span class="Label"><?php echo $theme['Antrag']?></span><span class="titel Antrag"><?php echo $theme['Thema']?></span></a></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <p class="stagefooterspace"></p>
                        </div>
                    </div>
                </div>
