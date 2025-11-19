<section id="stage" class="work">
    <div class="font normal">
        <div class="first">
            <h3 class="marg">AKTUELLES+NEWS Archiv</h3>
            <?php if ( isset($_SESSION['login'])): ?><span class="btnEditnews btnEdit glyphicon glyphicon-pencil"></span><?php endif; ?>
            <p class="marg">Hier finden Sie unsere gesammelten Infos zu Veranstaltungen, Infoständen und aktuelle News.</p>
            <div class="flex-container">
                <?php foreach ($news as $nm) {?>
                    <a href="<?php echo $nm['news_Link']?>">
                        <div class="">
                            <h3 class="marg h3news"><?php echo $nm['news_Kategorie']?></h3>
                            <img class="firstimg" src="/news/<?php echo $nm['news_Bild']?>"/>
                            <h4 class="newsletters"><?php echo $nm['news_ersterAbsatz']?></h4>
                            <p class="newsletters"><?php echo $nm['news_Teasertext']?></p>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
        <br>
        <br>
        <br>
    </div>
</section>