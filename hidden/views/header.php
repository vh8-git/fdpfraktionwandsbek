
        <div id="backgroundWrapper">       
            <?php echo $script['header']; ?>
            <div class="wrapper">
                <header class="clearfix">
                    <a href="/home"><img class="logo" src="/images/FDP_Header.svg" alt="FDP_Fraktion_WEBsite" title="Zurück zur Startseite 'Home'"/>
                        <span class="text-hidden btn_login">FDP-Fraktion-Wandsbek</span>
                    </a>
                    <div class="wappen">
                        <img src="/images/BV_Wandsbek_Wappen.svg" alt="Wappen Wandsbek"/>
                    </div>
                    <div class="menu">
                        <div class="menuicon">
                            <span class="menuicon-bread top"></span>
                            <span class="menuicon-bread middle"></span>
                            <span class="menuicon-bread bottom"></span>
                        </div>
                        <nav id="main_nav">
                            <ul>
                                <li>
                                    <a class="nav_mark<?php echo ( $page === 'fraktion' ? ' navActiv' : ''); ?>" href="<?php echo ( $page === 'home' ? '/fraktion"' : '/fraktion"'); ?>">Unsere Fraktion</a>
                                </li>
                                <li>
                                    <a class="nav_mark<?php echo ( $page === 'requestinquiry' ? ' navActiv' : ''); ?>" href="<?php echo ( $page === 'home' ? '/requestinquiry' : '/requestinquiry"'); ?>">Unsere Themen<!--Anfragen + Anträge--></a>
                                </li>
                                <!--<li>
                                    <a class="nav_mark<?php echo ( $page === 'dates' ? ' navActiv' : ''); ?>" href="<?php echo ( $page === 'home' ? '/dates"' : '/dates"'); ?>">Unsere TermineThemen</a>
                                </li>
                                <li>
                                    <a class="nav_mark<?php echo ( $page === 'survey' ? ' navActiv' : ''); ?>" href="<?php echo ( $page === 'home' ? '/survey"' : '/survey"'); ?>">Unsere Umfragen</a>
                                </li>-->
                                <li>
                                    <a class="nav_mark<?php echo ( $page === 'press' ? ' navActiv' : ''); ?>" href="<?php echo ( $page === 'home' ? '/press"' : '/press"'); ?>">Presse</a>
                                </li>
                                <li>
                                    <a class="nav_mark<?php echo ( $page === 'aktuelles' ? ' navActiv' : ''); ?>" href="<?php echo ( $page === 'home' ? '/aktuelles"' : '/aktuelles"'); ?>">Aktuelles</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <?php echo $script['barNav']; ?>
                </header>
           