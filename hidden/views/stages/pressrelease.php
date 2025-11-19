<section id="stage" class="work">
    <div class="font normal">
        <div class="press">
            <h3 class="marg"><a class="linklast" href="/press">Pressemitteilungen</a></h3>
            <?php if ( isset($_SESSION['login'])): ?><span class="btnEditPress btnEdit glyphicon glyphicon-pencil"></span><?php endif; ?>
            <?php foreach ($press as $pm) { ?>
                <div id="<?php echo $pm['PDFlink']?>" class="clearfix marg">
                    <h4>Pressemitteilung / <span class=""><?php $date=date_create($pm['Datum']); echo date_format($date,"d.m.Y");?></span><a class="link" href="/presse/<?php echo $pm['PDFlink']?>Fraktion.pdf" target="_blank"> PDF-Version</a></h4>
                    <div class="pressreleaseimg"><img  src="/presse/<?php echo $pm['Bildname']?>"/> <p class="creditfrakimg"><?php echo $pm['Bildtext']?></p></div>
                    <h3 class="h3press"><?php echo $pm['Titel']?></h3>
                    <p><?php echo $pm['TextA1']?></p>
                    <p><?php echo $pm['TextA2']?></p>
                    <p><?php echo $pm['TextA3']?></p>
                    <p><?php echo $pm['TextA4']?></p>
                    <p><?php echo $pm['TextA5']?></p>
                    <p><?php echo $pm['TextA6']?></p>
                    <p class="pressspace"></p>
                </div>
            <?php } ?>
            <div class="marg">
                <p>Pressekontakt: Birgit Wolff, Vorsitzende der FDP-Fraktion Wandsbek<br>
                    Email: <a href="mailto:wolff@fdp-fraktion-wandsbek.de">wolff@fdp-fraktion-wandsbek.de</a><br>
                    Mobil: 0171-265 24 38<br>
                    Fraktionsanschrift: FDP Fraktion Wandsbek, Wandsbeker Marktstraße 59-61, 22041 Hamburg</p>
            </div>
            <p class="stagefooterspace"></p>
        </div>
    </div>
</section>