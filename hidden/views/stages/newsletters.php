<section id="stage" class="work">
    <div class="newsletters font normal">
        <div class="first">
            <h3 class="marg">AKTUELLES+NEWS</h3>
            <?php if ( isset($_SESSION['login'])): ?><span class="btnEditnews btnEdit glyphicon glyphicon-pencil"></span><?php endif; ?>
            <?php foreach ($news as $nm) { ?>
                <div id="<?php echo $nm['newsID']?>" class="clearfix marg news">
                    <h4 class="h3news"><?php echo $nm['news_Kategorie']?> / <span class="themeDate"><?php $date=date_create($nm['Datum']); echo date_format($date,"d.m.Y");?></span></h4>
                    <div class="pressreleaseimg">
                        <img  src="/news/<?php echo $nm['news_Bild']?>"/>
                        <p class="creditfrakimg"><?php echo $nm['news_Bildtext']?></p>
                    </div>
                    <h3 class="h3press"><?php echo $nm['news_ersterAbsatz']?></h3>
                    <p><?php echo $nm['news_TextA1']?></p>
                    <p><?php echo $nm['news_TextA2']?></p>
                    <p><?php echo $nm['news_TextA3']?></p>
                    <p><?php echo $nm['news_TextA4']?></p>
                    <p class="newsspace"></p>
                </div>
            <?php } ?>
                <p class="newsspace"></p>
                <p class="newsspace"></p>
        </div>
    </div>
</section>