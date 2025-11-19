s<section id="stage">
    <div class="font normal">
        <div id="press" class="press">
            <h3 class="marg">Presse</h3>
            <p class="marg">Hier stellen wir Ihnen vor, welche Presseinformationen wir verbreitet haben, welche Bürger-Umfragen derzeit gerade aktuell sind
                – und wer in unserer Fraktion <a class="linklast" href="/wolff"> Ansprechpartnerin </a>für die Presse ist. Weitere Informationen über uns und
                unsere Arbeit finden Sie auch bei <a href="https://www.facebook.com/FDPFraktionWandsbek/?modal=admin_todo_tour" target="_blank" title="facebook" class="linkflowtxt">Facebook</a>
                und auf <a href="https://www.instagram.com/fdpfraktionwandsbek/" target="_blank" title="instagram" class="linkflowtxt">Instagram</a>.<br><br></p>
            <div class="spalte">
                <div class="marg pressemitteilung">
                    <?php if ( isset($_SESSION['login'])): ?><span class="btnEditPress btnEdit glyphicon glyphicon-pencil"></span><?php endif; ?>
                    <h2>Pressemitteilungen der FDP-Fraktion<a class="link" href="/pressrelease">MEHR…</a></h2>
                    <?php foreach ($press as $pm) { ?>
                        <p>
                            <a target= "_blank" href="/pressrelease/#<?php echo $pm['PDFlink']?>"><span class="pressDate"><?php $date=date_create($pm['Datum']); echo date_format($date,"d.m.Y");?></span><span class="titelpress"><?php echo $pm['Titel']?></span></a>
                        </p>
                    <?php } ?>
                    <p>
                        <a target="_blank" href="/archivpress"><span class="pressDate"></span><span class="titelpress">… Archiv der Pressemitteilungen</span></a>
                    </p>
                </div>
                <div class="pressstelle">
                    <h4>Pressestelle</h4>
                    <p>der FDP-Fraktion in der<br>
                        Bezirksversammlung Wandsbek</p>
                    <p>Ansprechpartnerin: Birgit Wolff</p>
                    <p>Mobil: 0171-2652438</p>
                    <address>Postanschrift:<br>
                        FDP-Fraktion Wandsbek<br>
                        Wandsbeker Marktstr. 59-61<br>
                        22041 Hamburg</address>
                    <p>Email: <a href="mailto:wolff@fdp-fraktion-wandsbek.de">wolff@fdp-fraktion-wandsbek.de</a></p>
                </div>
            </div>
            <p class="stagefooterspace"></p>
        </div>
</section>