
                <div id="stage">
                    <div class="font normal">
                        <div id="theme" class="theme">
                            <h3 class="marg">Unsere Themen im Bezirk und in der Stadt</h3>
                            <p class="marg">Hier listen wir beispielhaft Anträge <span class="labeltxt">(Antrag)</span> und Kleinen Anfragen oder Auskunftsersuchen <span class="labeltxtnoc">(ohne Kennzeichnung)</span> und zeigen Ihnen mit welchen Themen wir uns in der Bezirksversammlung aktiv einbringen und die Politik in Bezirk und Stadt mitgestalten. Dazu dazu gehören auch Debattenanträge <span class="labeltxt">(Debatte)</span>, Reden im Bereich der Aktuellen Stunde <span class="labeltxt">(Aktuelle)</span> und Anfragen/Themen in Zusammenarbeit mit den FDP-Abgeordneten in der Hamburgischen Bürgerschaft <span class="labeltxt">(Bürgerschaft)</span>. Darüberhinaus prägen wir die Weiterentwicklung der bezirklichen Kommunalpolitik über unser Abstimmungsverhalten bei Anträgen anderer Fraktionen.</p>
                            <p class="marg">Natürlich sind wir über die Bezirksversammlung hinaus auch sehr vielfältig „vor Ort“ - mit Veranstaltungen, Informationsständen, im Austausch mit Bürgerinitiativen und Interessengemeinschaften und Interessenvertretungen – und vor allem auf vielen Ebenen mit den Bürgerinnen und Bürgern aus unserem Bezirk und ihre kleineren oder größeren Anliegen. Weiteres finden Sie hierzu auch unter „<a href="/press">Presse</a>“.</p>
                            <div class="marg">
                                <?php if (isset($_SESSION['login'])): ?><span class="btnEditRequestInquiry btnEdit glyphicon glyphicon-pencil"></span><?php endif; ?>
                                <p><span class="themeDate">Datum</span><span class="themeNR">Drs-Nummer</span><span class="Label"></span><span class="titel Antrag HDL">Titel</span></p>
                                <?php foreach ($themes as $theme) { ?>
                                    <p>
                                    <p><span class="themeDate"><?php $date=date_create($theme['Datum']); echo date_format($date,"d.m.Y");?></span><a target= "_blank" href="<?php echo $theme['Link']?>"><span class="themeNR"><?php echo $theme['DrsNumber']?></span><span class="Label"><?php echo $theme['Antrag']?></span><br><span class="titel Antrag"><?php echo $theme['Thema']?></span></a></p>
                                    </p>
                                <?php } ?>
                                <p><br>
                                    <span class="themeDate"></span><a href="/archivrequestinquiry"><span class="themeNR"></span><span class="Label"></span><span class="titel Antrag">... Archiv "Unsere Themen im Bezirk und in der Stadt"</span></a>
                                </p>
                            </div>
                        <p class="stagefooterspace"></p>
                    </div>
                </div>
            </div>



<!--

-->