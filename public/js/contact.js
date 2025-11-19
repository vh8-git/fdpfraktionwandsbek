//Diese Function setzt "querySelectorAll" in eine Variable und macht es möglich Objekte mit ID(#), Class(.) anzusprechen. Es wird immer das erste Element des angewählten Typs angesprochen oder durch [x] das entsprechende.
// Beispiel   var myClass = qSA('.myClass'); var myClass0 = sQA('.myClass')[0];  
var qS = function ( elem ) {
  return document.querySelector( elem );
};
var qSA = function ( elem ) {
  return document.querySelectorAll( elem );
};

var flag = true;
var firstfalse = 0;
var count = 0;

var messagespan = qSA('.messagespan');
var emailRegEx = /^[\w%_\-.\d]+@[\w.\-]+\.[A-Za-z]{2,6}$/;
var email = qS('input[name="mailAddress"]');
var messageimg = qSA('.check');

qS('#mailAddress').onblur = function() {
    
    if (!email.value.match(emailRegEx)) {
        switch (count) {
            case 0 :
                messagespan[0].innerHTML='Bitte geben Sie eine gültige Emailadresse an!';
                count++;
                messageimg[0].setAttribute("class", "check attention", 0);
                qS('#mailAddress').focus();
                break;
            case 1 :
                messagespan[0].innerHTML='Gültige Emailadressen haben folgendes Muster "xxx@xxx.xx" <br/> und dürfen keine Umlaute und Sonderzeichen enthalten';
                count = 0;
                messageimg[0].setAttribute("class", "check fail", 0);
                qS('#mailAddress').focus();
                break;
        };
    } else {
        messagespan[0].innerHTML='';
        messageimg[0].setAttribute("class", "check ok", 0);
    }
};

qS('#firstName').onblur = function() {
    
    if (qS('#firstName').value > '') {
        messagespan[1].innerHTML='';
        messageimg[1].setAttribute("class", "check ok", 0);
    } else {
        messagespan[1].innerHTML='Bitte geben Sie Ihren Vornamen an!';
        messageimg[1].setAttribute("class", "check fail", 0);
        qS('#firstName').focus();
    }
};

qS('#name').onblur = function() {
    
    if (qS('#name').value > '') {
        messagespan[2].innerHTML='';
        messageimg[2].setAttribute("class", "check ok", 0);
    } else {
        messagespan[2].innerHTML='Bitte geben Sie Ihren Nachnamen an!';
        messageimg[2].setAttribute("class", "check fail", 0);
        qS('#name').focus();
    }
};

qS('#message').onblur = function() {
    
    if (qS('#message').value.length > 0) {
        messagespan[3].innerHTML='';
        messageimg[3].setAttribute("class", "check ok", 0);
    } else {
        messagespan[3].innerHTML='Bitte geben Sie mindestens 20 Zeichen ein !';
        messageimg[3].setAttribute("class", "check fail", 0);
        qS('#message').focus();
    }
};

qS('.sent_bttn').onclick = function(e){

    e.preventDefault();
    var flag = true;

    for (i = 0; i < document.forms[0].elements.length; i++) {
        if (document.forms[0].elements[i].value === "") {
            switch (i) {
                case 0 :
                    messagespan[i].innerHTML='Bitte geben Sie eine gültige Emailadresse an!';
                    if (flag === true) {firstfalse = i;};
                    flag = false;
                    break;
                case 1 :
                    messagespan[i].innerHTML='Bitte geben Sie Ihren Vornamen an!';
                    if (flag === true) {firstfalse = i;};
                    flag = false;
                    break;
                case 2 :
                    messagespan[i].innerHTML='Bitte geben Sie Ihren Nachnamen an!';
                    if (flag === true) {firstfalse = i;};
                    flag = false;
                    break;
                case 3 :
                    messagespan[i].innerHTML='Bitte geben Sie eine Nachricht an';
                    if (flag === true) {firstfalse = i;};
                    flag = false;
                    break;
                case 4 :
                    messagespan[i].innerHTML='Die Zeichenfolge wird zum Absenden benötigt.';
                    if (flag === true) {firstfalse = i;};
                    flag = false;
                    break;
            };
        };
    };

    console.log(flag);
    if (flag === false) {
            document.forms[0].elements[firstfalse].focus();
            return false;
             console.log('Nö.');  
        } else {
            document.forms['contactForm'].submit();
            return true;
    };
        
    return false;
};

//$(document).ready(function() {
//    $('.layer').html('<div class="fullScreenLayer"><div class="messageBoxFullscreen"><?php echo $success; ?></div></div>');
//    $('.fullScreenLayer').css('display', 'block');
//});