<?php
//Der mainController steuert den grundsätzlichen Seitenaufbau und stellt die einzelnen
//Seiteninhalte nach Bedarf (über eine switch) zusammen.
 

// BAUT DEN SEITENINHALT AUF
switch ($page) {
    
    case 'home' :
        
        // benötigte Funktionen laden (MODELS)
        
        // benötigten Controller laden (CONTROLLERS)

        require_once APP_PATH . 'controllers/cont.work.php';


        //Setzt den Werte für die Variablen $header, socNav, barNav und selectNav die dann in header.php und footer.php genutzt werden.
        $script['header'] = '';
        $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
        $script['fraktionNav'] = file_get_contents(APP_PATH . 'views/fraktionNav.php');
        $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');
        $script['cmsButton'] = file_get_contents(APP_PATH . 'views/cmsButton.php');

        // Seite zusammensetzen (VIEWS)
        require_once APP_PATH . 'views/head.php';
        //require_once APP_PATH . 'views/loginButton.php';
        require_once APP_PATH . 'views/header.php';
        require_once APP_PATH . 'views/stages/work.php';
        require_once APP_PATH . 'views/footer.php';
        require_once APP_PATH . 'views/foot.php';
        break;

    case 'workedit' :

        if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {

            // benötigte Funktionen laden (MODELS)

            // benötigten Controller laden (CONTROLLERS)

            require_once APP_PATH . 'controllers/cont.workedit.php';


            //Setzt den Werte für die Variablen $header, socNav, barNav und selectNav die dann in header.php und footer.php genutzt werden.
            $script['header'] = '';
            $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
            $script['fraktionNav'] = file_get_contents(APP_PATH . 'views/fraktionNav.php');
            $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');
            $script['cmsButton'] = file_get_contents(APP_PATH . 'views/cmsButton.php');

            // Seite zusammensetzen (VIEWS)
            require_once APP_PATH . 'views/head.php';
            //require_once APP_PATH . 'views/loginButton.php';
            require_once APP_PATH . 'views/header.php';
            require_once APP_PATH . 'views/stages/workEdit.php';
            require_once APP_PATH . 'views/footer.php';
            require_once APP_PATH . 'views/foot.php';
            break;
            
            } else {
            header('Location: /login');
            break;
        }

    case 'fraktion' :

        //authorize();

        // benötigte Funktionen laden (MODELS)

        // benötigten Controller laden (CONTROLLERS)

        //Setzt den Werte für die Variablen $header, socNav, barNav und selectNav die dann in header.php und footer.php genutzt werden.
        $script['header'] = '';
        $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
        $script['fraktionNav'] = file_get_contents(APP_PATH . 'views/fraktionNav.php');
        $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');

        // Seite zusammensetzen (VIEWS)
        require_once APP_PATH . 'views/head.php';
        //require_once APP_PATH . 'views/loginButton.php';
        require_once APP_PATH . 'views/header.php';
        require_once APP_PATH . 'views/stages/fraktion.php';
        require_once APP_PATH . 'views/footer.php';
        require_once APP_PATH . 'views/foot.php';
        break;

    case 'wolff' :

        // benötigte Funktionen laden (MODELS)

        // benötigten Controller laden (CONTROLLERS)

        //Setzt den Werte für die Variablen $header, socNav, barNav und selectNav die dann in header.php und footer.php genutzt werden.
        $script['header'] = '';
        $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
        $script['fraktionNav'] = file_get_contents(APP_PATH . 'views/fraktionNav.php');
        $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');


        // Seite zusammensetzen (VIEWS)
        require_once APP_PATH . 'views/head.php';
        //require_once APP_PATH . 'views/loginButton.php';
        require_once APP_PATH . 'views/header.php';
        require_once APP_PATH . 'views/stages/wolff.php';
        require_once APP_PATH . 'views/footer.php';
        require_once APP_PATH . 'views/foot.php';
        break;

    case 'shadi' :

        // benötigte Funktionen laden (MODELS)

        // benötigten Controller laden (CONTROLLERS)

        //Setzt den Werte für die Variablen $header, socNav, barNav und selectNav die dann in header.php und footer.php genutzt werden.
        $script['header'] = '';
        $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
        $script['fraktionNav'] = file_get_contents(APP_PATH . 'views/fraktionNav.php');
        $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');


        // Seite zusammensetzen (VIEWS)
        require_once APP_PATH . 'views/head.php';
        //require_once APP_PATH . 'views/loginButton.php';
        require_once APP_PATH . 'views/header.php';
        require_once APP_PATH . 'views/stages/shadi.php';
        require_once APP_PATH . 'views/footer.php';
        require_once APP_PATH . 'views/foot.php';
        break;

    case 'ritter' :

        // benötigte Funktionen laden (MODELS)

        // benötigten Controller laden (CONTROLLERS)

        //Setzt den Werte für die Variablen $header, socNav, barNav und selectNav die dann in header.php und footer.php genutzt werden.
        $script['header'] = '';
        $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
        $script['fraktionNav'] = file_get_contents(APP_PATH . 'views/fraktionNav.php');
        $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');


        // Seite zusammensetzen (VIEWS)
        require_once APP_PATH . 'views/head.php';
        //require_once APP_PATH . 'views/loginButton.php';
        require_once APP_PATH . 'views/header.php';
        require_once APP_PATH . 'views/stages/ritter.php';
        require_once APP_PATH . 'views/footer.php';
        require_once APP_PATH . 'views/foot.php';
        break;

    case 'wicher' :

        // benötigte Funktionen laden (MODELS)

        // benötigten Controller laden (CONTROLLERS)

        //Setzt den Werte für die Variablen $header, socNav, barNav und selectNav die dann in header.php und footer.php genutzt werden.
        $script['header'] = '';
        $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
        $script['fraktionNav'] = file_get_contents(APP_PATH . 'views/fraktionNav.php');
        $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');


        // Seite zusammensetzen (VIEWS)
        require_once APP_PATH . 'views/head.php';
        //require_once APP_PATH . 'views/loginButton.php';
        require_once APP_PATH . 'views/header.php';
        require_once APP_PATH . 'views/stages/wicher.php';
        require_once APP_PATH . 'views/footer.php';
        require_once APP_PATH . 'views/foot.php';
        break;

    case 'zubenannte' :

        // benötigte Funktionen laden (MODELS)

        // benötigten Controller laden (CONTROLLERS)

        //Setzt den Werte für die Variablen $header, socNav, barNav und selectNav die dann in header.php und footer.php genutzt werden.
        $script['header'] = '';
        $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
        $script['fraktionNav'] = file_get_contents(APP_PATH . 'views/fraktionNav.php');
        $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');


        // Seite zusammensetzen (VIEWS)
        require_once APP_PATH . 'views/head.php';
        //require_once APP_PATH . 'views/loginButton.php';
        require_once APP_PATH . 'views/header.php';
        require_once APP_PATH . 'views/stages/zubenannte.php';
        require_once APP_PATH . 'views/footer.php';
        require_once APP_PATH . 'views/foot.php';
        break;

    case 'requestinquiry' :

        // benötigte Funktionen laden (MODELS)

        // benötigten Controller laden (CONTROLLERS)
        require_once APP_PATH . 'controllers/cont.requestinquiry.php';

        //Setzt den Werte für die Variablen $header, socNav, barNav und selectNav die dann in header.php und footer.php genutzt werden.
        $script['header'] = '<div class="stageBackground bgImageWork"></div>';
        $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
        $script['fraktionNav'] = '';
        $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');

        // Seite zusammensetzen (VIEWS)
        require_once APP_PATH . 'views/head.php';
        //require_once APP_PATH . 'views/loginButton.php';
        require_once APP_PATH . 'views/header.php';
        require_once APP_PATH . 'views/stages/requestinquiry.php';
        require_once APP_PATH . 'views/footer.php';
        require_once APP_PATH . 'views/foot.php';
        break;

    case 'requestinquiryedit' :

        if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
            // benötigte Funktionen laden (MODELS)

            // benötigten Controller laden (CONTROLLERS)

            require_once APP_PATH . 'controllers/cont.requestinquiryedit.php';


            //Setzt den Werte für die Variablen $header, socNav, barNav und selectNav die dann in header.php und footer.php genutzt werden.
            $script['header'] = '<div class="stageBackground bgImageWork"></div>';
            $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
            $script['fraktionNav'] = '';
            $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');


            // Seite zusammensetzen (VIEWS)
            require_once APP_PATH . 'views/head.php';
            //require_once APP_PATH . 'views/loginButton.php';
            require_once APP_PATH . 'views/header.php';
            require_once APP_PATH . 'views/stages/requestinquiryEdit.php';
            require_once APP_PATH . 'views/footer.php';
            require_once APP_PATH . 'views/foot.php';
            break;

        } else {
            header('Location: /login');
            break;
        }
    case 'archivrequestinquiry' :

        // benötigte Funktionen laden (MODELS)

        // benötigten Controller laden (CONTROLLERS)
        require_once APP_PATH . 'controllers/cont.archivrequestinquiry.php';

        //Setzt den Werte für die Variablen $header, socNav, barNav und selectNav die dann in header.php und footer.php genutzt werden.
        $script['header'] = '<div class="stageBackground bgImageWork"></div>';
        $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
        $script['fraktionNav'] = '';
        $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');


        // Seite zusammensetzen (VIEWS)
        require_once APP_PATH . 'views/head.php';
        //require_once APP_PATH . 'views/loginButton.php';
        require_once APP_PATH . 'views/header.php';
        require_once APP_PATH . 'views/stages/archivrequestinquiry.php';
        require_once APP_PATH . 'views/footer.php';
        require_once APP_PATH . 'views/foot.php';
        break;

    case 'aktuellesarchiv' :

        // benötigte Funktionen laden (MODELS)

        // benötigten Controller laden (CONTROLLERS)

        require_once APP_PATH . 'controllers/cont.newsarchiv.php';

        //Setzt den Werte für die Variablen $header, socNav, barNav und selectNav die dann in header.php und footer.php genutzt werden.
        $script['header'] = '<div class="stageBackground bgImageWork"></div>';
        $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
        $script['fraktionNav'] = '';
        $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');


        // Seite zusammensetzen (VIEWS)
        require_once APP_PATH . 'views/head.php';
        //require_once APP_PATH . 'views/loginButton.php';
        require_once APP_PATH . 'views/header.php';
        require_once APP_PATH . 'views/stages/news.php';
        require_once APP_PATH . 'views/footer.php';
        require_once APP_PATH . 'views/foot.php';
        break;

    case 'aktuelles' :

        // benötigte Funktionen laden (MODELS)

        // benötigten Controller laden (CONTROLLERS)

        require_once APP_PATH . 'controllers/cont.newsletters.php';

        //Setzt den Werte für die Variablen $header, socNav, barNav und selectNav die dann in header.php und footer.php genutzt werden.
        $script['header'] = '<div class="stageBackground bgImageWork"></div>';
        $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
        $script['fraktionNav'] = '';
        $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');


        // Seite zusammensetzen (VIEWS)
        require_once APP_PATH . 'views/head.php';
        //require_once APP_PATH . 'views/loginButton.php';
        require_once APP_PATH . 'views/header.php';
        require_once APP_PATH . 'views/stages/newsletters.php';
        require_once APP_PATH . 'views/footer.php';
        require_once APP_PATH . 'views/foot.php';
        break;

    case 'newslettersedit' :

        if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
            // benötigte Funktionen laden (MODELS)

            // benötigten Controller laden (CONTROLLERS)
            require_once APP_PATH . 'controllers/cont.newslettersedit.php';

            //Setzt den Werte für die Variablen $header, socNav, barNav und selectNav die dann in header.php und footer.php genutzt werden.
            $script['header'] = '<div class="stageBackground bgImageWork"></div>';
            $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
            $script['fraktionNav'] = '';
            $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');


            // Seite zusammensetzen (VIEWS)
            require_once APP_PATH . 'views/head.php';
            //require_once APP_PATH . 'views/loginButton.php';
            require_once APP_PATH . 'views/header.php';
            require_once APP_PATH . 'views/stages/newslettersEdit.php';
            require_once APP_PATH . 'views/footer.php';
            require_once APP_PATH . 'views/foot.php';
            break;

        } else {
            header('Location: /login');
            break;
        }

    case 'dates' :

        // benötigte Funktionen laden (MODELS)

        // benötigten Controller laden (CONTROLLERS)

        //Setzt den Werte für die Variablen $header, socNav, barNav und selectNav die dann in header.php und footer.php genutzt werden.
        $script['header'] = '<div class="stageBackground bgImageWork"></div>';
        $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
        $script['fraktionNav'] = '';
        $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');


        // Seite zusammensetzen (VIEWS)
        require_once APP_PATH . 'views/head.php';
        //require_once APP_PATH . 'views/loginButton.php';
        require_once APP_PATH . 'views/header.php';
        require_once APP_PATH . 'views/stages/dates.php';
        require_once APP_PATH . 'views/footer.php';
        require_once APP_PATH . 'views/foot.php';
        break;

    case 'press' :

        // benötigte Funktionen laden (MODELS)

        // benötigten Controller laden (CONTROLLERS)
        require_once APP_PATH . 'controllers/cont.press.php';

        //Setzt den Werte für die Variablen $header, socNav, barNav und selectNav die dann in header.php und footer.php genutzt werden.
        $script['header'] = '<div class="stageBackground bgImageWork"></div>';
        $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
        $script['fraktionNav'] = '';
        $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');


        // Seite zusammensetzen (VIEWS)
        require_once APP_PATH . 'views/head.php';
        //require_once APP_PATH . 'views/loginButton.php';
        require_once APP_PATH . 'views/header.php';
        require_once APP_PATH . 'views/stages/press.php';
        require_once APP_PATH . 'views/footer.php';
        require_once APP_PATH . 'views/foot.php';
        break;

    case 'pressedit' :

        if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
            // benötigte Funktionen laden (MODELS)

            // benötigten Controller laden (CONTROLLERS)
            require_once APP_PATH . 'controllers/cont.pressedit.php';

            //Setzt den Werte für die Variablen $header, socNav, barNav und selectNav die dann in header.php und footer.php genutzt werden.
            $script['header'] = '<div class="stageBackground bgImageWork"></div>';
            $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
            $script['fraktionNav'] = '';
            $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');


            // Seite zusammensetzen (VIEWS)
            require_once APP_PATH . 'views/head.php';
            //require_once APP_PATH . 'views/loginButton.php';
            require_once APP_PATH . 'views/header.php';
            require_once APP_PATH . 'views/stages/pressEdit.php';
            require_once APP_PATH . 'views/footer.php';
            require_once APP_PATH . 'views/foot.php';
            break;
        } else {
            header('Location: /login');
            break;
        }

    case 'pressrelease' :

        // benötigte Funktionen laden (MODELS)

        // benötigten Controller laden (CONTROLLERS)
        require_once APP_PATH . 'controllers/cont.pressrelease.php';

        //Setzt den Werte für die Variablen $header, socNav, barNav und selectNav die dann in header.php und footer.php genutzt werden.
        $script['header'] = '';
        $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
        $script['fraktionNav'] = '';
        $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');


        // Seite zusammensetzen (VIEWS)
        require_once APP_PATH . 'views/head.php';
        //require_once APP_PATH . 'views/loginButton.php';
        require_once APP_PATH . 'views/header.php';
        require_once APP_PATH . 'views/stages/pressrelease.php';
        require_once APP_PATH . 'views/footer.php';
        require_once APP_PATH . 'views/foot.php';
        break;

        case 'archivpress' :

        // benötigte Funktionen laden (MODELS)

        // benötigten Controller laden (CONTROLLERS)
        require_once APP_PATH . 'controllers/cont.archivpress.php';

        //Setzt den Werte für die Variablen $header, socNav, barNav und selectNav die dann in header.php und footer.php genutzt werden.
        $script['header'] = '';
        $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
        $script['fraktionNav'] = '';
        $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');


        // Seite zusammensetzen (VIEWS)
        require_once APP_PATH . 'views/head.php';
        //require_once APP_PATH . 'views/loginButton.php';
        require_once APP_PATH . 'views/header.php';
        require_once APP_PATH . 'views/stages/archivpress.php';
        require_once APP_PATH . 'views/footer.php';
        require_once APP_PATH . 'views/foot.php';
        break;

    case 'survey' :

        // benötigte Funktionen laden (MODELS)

        // benötigten Controller laden (CONTROLLERS)

        //Setzt den Werte für die Variablen $header, socNav, barNav und selectNav die dann in header.php und footer.php genutzt werden.
        $script['header'] = '';
        $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
        $script['fraktionNav'] = '';
        $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');


        // Seite zusammensetzen (VIEWS)
        require_once APP_PATH . 'views/head.php';
        //require_once APP_PATH . 'views/loginButton.php';
        require_once APP_PATH . 'views/header.php';
        require_once APP_PATH . 'views/stages/survey.php';
        require_once APP_PATH . 'views/footer.php';
        require_once APP_PATH . 'views/foot.php';
        break;

    case 'archivsurvey' :

        // benötigte Funktionen laden (MODELS)

        // benötigten Controller laden (CONTROLLERS)

        //Setzt den Werte für die Variablen $header, socNav, barNav und selectNav die dann in header.php und footer.php genutzt werden.
        $script['header'] = '';
        $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
        $script['fraktionNav'] = '';
        $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');


        // Seite zusammensetzen (VIEWS)
        require_once APP_PATH . 'views/head.php';
        //require_once APP_PATH . 'views/loginButton.php';
        require_once APP_PATH . 'views/header.php';
        require_once APP_PATH . 'views/stages/archivsurvey.php';
        require_once APP_PATH . 'views/footer.php';
        require_once APP_PATH . 'views/foot.php';
        break;

    case 'legal' :

        $script['header'] = '';
        $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
        $script['fraktionNav'] = '';
        $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');

        
        require_once APP_PATH . 'views/head.php';
        //require_once APP_PATH . 'views/loginButton.php';
        require_once APP_PATH . 'views/header.php';
        require_once APP_PATH . 'views/stages/legal.php';
        require_once APP_PATH . 'views/footer.php';
        require_once APP_PATH . 'views/foot.php';
        break;

    case 'datasecure' :

        $script['header'] = '';
        $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
        $script['fraktionNav'] = '';
        $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');


        require_once APP_PATH . 'views/head.php';
        //require_once APP_PATH . 'views/loginButton.php';
        require_once APP_PATH . 'views/header.php';
        require_once APP_PATH . 'views/stages/datasecure.php';
        require_once APP_PATH . 'views/footer.php';
        require_once APP_PATH . 'views/foot.php';
        break;
    
    case 'login' :
        
        //Weiche damit eingelockte User direkt zur Seite Userinfo weitergeleitet werden haben. Dafür muss die Variabel $_SESSION['login'] = 1 sein.
        if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
            header('Location: createUrl(["page" => "userInfo"])');
            break;
        
        } else {

            $script['header'] = '';
            $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
            $script['fraktionNav'] = '';
            $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');

            require_once APP_PATH . 'controllers/cont.login.php';
        
        require_once APP_PATH . 'views/head.php';
        //require_once APP_PATH . 'views/loginButton.php';
        require_once APP_PATH . 'views/header.php';
        require_once APP_PATH . 'views/stages/login.php';
        require_once APP_PATH . 'views/footer.php';
        require_once APP_PATH . 'views/foot.php';
        break;
        }

    case 'logout' :
        
        require_once APP_PATH . 'models/func.logout.php';
        
        logout();
        
        header('Location: /home');
        break;
    
    case 'hidden' :
        
        break;
    
    
    default :

        header('Location: /home');
        break;
        
}

$_SESSION['intro'] = '0';