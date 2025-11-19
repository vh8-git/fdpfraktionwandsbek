
                <?php echo var_dump($_SESSION); ?>
                <div id="stage">
                    <div>
                        <?php if ( !isset($row["aktiv"])): ?><?php if ( isset($_SESSION['login'])): ?><span class="btnShowStoerer btnShow glyphicon glyphicon-pencil"></span><?php endif; ?><?php endif; ?>
                        <?php if ( isset($row["aktiv"])): ?>
                            <div class="stoererbackground skew">
                            <form action="<?php echo createUrl(['page' => 'work'])?>" method="post">
                                <p><?php echo $row["headline1"]?></p>
                                <p><?php echo $row["headline2"]?></p>
                                <a class="stoererlink link" target= "_blank" href="<?php echo $row["link"]?>"><?php echo $row["linktext"]?></a><p>
                            </form>
                            <?php if ( isset($_SESSION['login'])): ?><span class="btnEditStoerer btnEdit glyphicon glyphicon-pencil"></span><?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="font normal">
                        <div id="start" class="first wellcome" href="/start">
                            <div class="wellcome_content<?php if ( !isset($row["aktiv"])): ?>_ohneStoerer<?php endif; ?> marg"><span class="well1">Wir begrüßen Sie</span><br><span class="well2">auf der Website der FDP Fraktion Wandsbek</span></div>
                            <div class="wellcome_content<?php if ( !isset($row["aktiv"])): ?>_ohneStoerer<?php endif; ?> marg">
                                <p>In aller Kürze finden Sie die <a href="/theme">Themen</a>, die wir aktiv in die Arbeit der Bezirksversammlung Wandsbek einbringen, neben unseren regelmäßigen Debatten- und Diskussionsbeiträgen.
                                Wir nehmen Sie mit zu <!--<a href="/dates">-->Terminen<!--</a>--> und lassen Sie wissen, was wir den Medien <a href="/press">übermittelt</a> haben. Und natürlich stellen wir Ihnen unsere <a href="/fraktion">Fraktion</a> vor.</p>
                                <p>Wenn Sie mehr wissen möchten, <a href="mailto:info@fdp-fraktion-wandsbek.de">melden</a> Sie sich gern!</p>
                                <!--<p>HINWEIS: Teile dieser WEBsite werden zur Zeit in Zuge der Neuwahlen zur Bezirksversammlung Hamburg Wandsbek überarbeitet</p>-->
                            </div>
                        </div>
                        <?php if ( isset($_SESSION['login'])): ?><span class="btnEditnews btnEdit glyphicon glyphicon-pencil"></span><?php endif; ?>
                        <div class="flex-container">
                            <?php foreach ($news as $nm) {?>
                                <a class="a-work" href="<?php echo $nm['news_Link']?>">
                                    <div class="">
                                        <h3 class="marg h3news"><?php echo $nm['news_Kategorie']?></h3>
                                        <img class="firstimg" src="/news/<?php echo $nm['news_Bild']?>"/>
                                        <h4 class="newsletters"><?php echo $nm['news_ersterAbsatz']?></h4>
                                        <p class="newsletters"><?php echo $nm['news_Teasertext']?></p>
                                    </div>
                                </a>
                            <?php } ?>
                            <p class="marg firstp"><a class="linknews" href="/aktuellesarchiv">Archiv AKTUELLES+NEWS …</a></p>
                        </div>
                        <div id="press" class="first press btn_press">
                            <h3 class="marg">Presse<a class="link" href="/press">MEHR…</a></h3></h3>
                            <img class="firstimg" src="/images/FDP_News.jpg"/>
                            <p class="creditimg">(Foto: iStock/fotogestoeber.de)</p>
                            <p class="marg firstp">Hier stellen wir Ihnen vor, welche Presseinformationen wir verbreitet haben, welche Bürger-Umfragen derzeit aktuell sind
                                – und wer in unserer Fraktion Ansprechpartnerin für die Presse ist. Weitere Informationen über uns und unsere Arbeit finden Sie auch bei <a href="https://www.facebook.com/FDPFraktionWandsbek/?modal=admin_todo_tour" target="_blank" title="facebook" class="linkflowtxt">Facebook</a>
                                und auf <a href="https://www.instagram.com/fdpfraktionwandsbek/" target="_blank" title="instagram" class="linkflowtxt">Instagram</a>. <!--<a class="linktheme" href="/press">Weiter…</a></p>-->
                        </div>
                        <div id="fraktion" class="first fraktion btn_fraktion">
                            <h3 class="marg">Unsere Fraktion <a class="link" href="/fraktion">MEHR…</a></h3>
                            <img class="firstimg" src="/images/FDP_Fraktion.jpg"/>
                            <p class="marg firstp">Wir, die Fraktion der Freien Demokraten (FDP) in der Bezirksversammlung Wandsbek, setzen uns für ein modernes, generationengerechtes
                                und faires Wandsbek ein. Unsere Zielsetzung ist gleichermaßen ambitioniert und auch klar: Wir wollen einen Bezirk mit Chancen für alle bald
                                450.000 Wandsbeker, einen Bezirk, in dem es nicht darauf ankommt, ob man aus Eilbek, Bramfeld, Wellingsbüttel oder einem anderen Stadtteil
                                stammt. <!--<a class="link" href="/fraktion">Weiter…</a>-->
                            </p>
                        </div>
                        <div id="theme" class="first theme btn_theme">
                            <h3 class="marg">Unsere Themen<a class="linktheme" href="/requestinquiry">MEHR…</a></h3>
                            <img class="firstimg" src="/images/FDP_Themen.jpg"/>
                            <p class="marg firstp">Beispielhaft an Anträgen und Kleinen Anfragen zeigen wir Ihnen in diesem Bereich unserer Website, mit welchen Themen
                                wir uns in der Bezirksversammlung einbringen – darüber hinaus gestalten wir die Politik natürlich auch über unsere Debattenbeiträge und
                                Positionen zu Beiträgen der anderen Fraktionen und mit unserem Abstimmungsverhalten. Weitere Themen finden Sie beispielsweise auch unter
                                „Presse“. <!--<a class="linktheme" href="/theme">Weiter…</a></p>-->
                        </div>
                        <!--<div id="survey" class="first survey btn_survey">
                            <h3 class="marg">Unsere Umfragen<a class="link" href="/survey">MEHR…</a></h3>
                            <img class="firstimg" src="/images/FDP_Survey.jpg"/>
                            <p class="creditimg">(Bild: iStock/juststock)</p>

                            <p class="marg firstp">Was denken die Bürger über dieses oder jenes Vorhaben, was könnte besser gemacht werden, wo sollte sich etwas verändern?
                                Für unsere politischen Entscheidungen erkunden wir, was die Menschen in unserem Bezirk sich wünschen und wo es Optimierungsbedarf gibt.
                                Dafür stellen wir Online-Umfragen bereit. Über die Ergebnisse berichten wir in Presseinformationen beziehungsweise lassen die Anregungen
                                einfließen in unsere Arbeit. <a class="linktheme" href="/survey">Weiter…</a></p>
                        </div>-->
                        <p class="stagefooterspace"></p>
                    </div>
                </div>