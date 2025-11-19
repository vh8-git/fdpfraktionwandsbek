//Grundüberlegung
//
//alle Button der Seite haben eine ID über die das Script selectiert wird.
//Nur Button der Hauptnavigation und der SocialNav können über HMTL (href="") weiterleiten.


//Zurück auf die Startseite
$('.btnHome').on("click", function(){
    window.location='/work'; 
    return false;
});

$('.btnLogin').on("click", function(){
    window.location='/login';
    return false;
});

$('.btnlogin').on("click", function(){
    window.location='/login';
    return false;
});

$('.btnHideLogin').on("click", function(){
    window.location='/login'; 
    return false;
});

//Beenden leitet im Eingelockten Zustand auf Userinfo
$('.btnUserInfo').on("click", function(){
    window.location='/userInfo';
    return false;
});

//Beenden den Login und führt über maincontrol zur
$('.btnLogout').on("click", function(){
    window.location='/logout';
    return false;
});

//Leitet zurück auf Fraktionsseite
$('.btn_fraktion').on( "click", function(){
    window.location='/fraktion';
    return false;
});

$('.btn_dates').on( "click", function(){
    window.location='/dates';
    return false;
});

$('.btn_requestinquiry').on( "click", function(){
    window.location='/requestinquiry';
    return false;
});

$('.btn_survey').on( "click", function(){
    window.location='/survey';
    return false;
});

$('.btn_press').on( "click", function(){
    window.location='/press';
    return false;
});

//CMS-Button
$('.btnEditStoerer').on( "click", function(){
    window.location='/workedit';
    return false;
});

$('.btnShowStoerer').on( "click", function(){
    window.location='/workedit';
    return false;
});

$('.btnEditRequestInquiry').on( "click", function(){
    window.location='/requestinquiryedit';
    return false;
});

$('.btnEditPress').on( "click", function(){
    window.location='/pressedit';
    return false;
});

$('.btnEditnews').on( "click", function(){
    window.location='/newslettersedit';
    return false;
});