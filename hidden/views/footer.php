
                <div class="footer">
                    <nav id="main_nav_bottom">
                        <ul>
                            <li>
                                <a class="nav_mark" href="mailto:info@fdp-fraktion-wandsbek.de?subject=Nachricht%20von%20der%20Webseite%20der%20FDP-Fraktion%20Wandsbek"">Kontakt</a>
                            </li>
                            <li>
                                <a class="nav_mark <?php echo ( $page === 'legal' ? ' navActiv' : ''); ?>" href="/legal">Impressum</a>
                            </li>
                            <li>
                                <a class="nav_mark <?php echo ( $page === 'datasecure' ? ' navActiv' : ''); ?>" href="/datasecure">Datenschutz</a>
                            </li>
                            <!--<li>
                                <a class="nav_mark <?php echo ( $page === 'sitemap' ? ' navActiv' : ''); ?>" href="/sitemap">Sitemap</a>
                            </li>-->
                            <?php echo $script['socialNav']; ?>
                        </ul>
                    </nav>
                    <span class="footertxt btnlogin">©2020-2024 FDP Fraktion BV Wandsbek</span>
                    <?php if ( isset($_SESSION['login'])): ?><span class="footertxt btnLogout">Logout</span><?php endif; ?>
                </div>
            </div><!-- Wrapper -->
        </div><!-- BackgroundWrapper -->