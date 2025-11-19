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
var headline1 = 0;
var headline2 = 0;
var linktext = 0;
var link = 0;
var aktiv = 0;

// var headline1 = $_POST['headline1'];
// var headline2 = $_POST['headline2'];
// var linktext = $_POST['linktext'];
// var link = $_POST['link'];
// var aktiv = $_POST['aktiv'];

qS('#stoererID').onblur = function() {

};

qS('#headline1').onblur = function() {
    console.log("No");
    console.log("YES");

};

qS('#headline2').onblur = function() {

};

qS('#linktext').onblur = function() {

};

qS('#link').onblur = function(){

};

qS('#aktiv').onblur = function() {

};

