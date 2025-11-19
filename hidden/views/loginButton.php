
<?php if( !isset($_SESSION['login']) && $page == 'home' || $page == 'logout'): ?>  <!--beim ersten Start kommt eine Fehlermeldung ober einen fehlerhaften Index -->
        <button type="button" class="btnLogin btn btn-default btn-lg">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </button>
<?php elseif ( isset($_SESSION['login']) && $_SESSION['login'] == 1): ?>
        <button type="button"  class="btnLogout btn btn-default btn-lg">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </button>
<?php endif; ?>