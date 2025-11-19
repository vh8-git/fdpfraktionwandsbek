<?php
/*
	Zuständig dafür alle URLs zu erstellen
	@param 	query 	array urlQuery, der den Part des URL ab des baseUrl als array enthält
	@return url 	string der die zusammengesetzte url enthält
*/

function createUrl($query) {
    
    // Den Rückgabewert vorstellen, soll ein String sein, der immer mit "/" beginnt
    $url = '/';
    
    // Ein Such-Array auf das die komplette Url untersucht werden soll
    $search 	= array('Ü', 'ü', 'Ö', 'ö', 'Ä', 'ä', 'ß');

    // Sonderzeichen finden und ersetzen, damit urls "schön" bleiben
    // 1. herausfinden, ob überhaupt Sonderzeichen vorhanden sind!

    // sollte es keine Sonderzeichen geben, bleibt dieses Array leer.
    $specialCount = array();

    //  URL-Array durchlaufen und jeden Part einzeln ($single) untersuchen
    foreach  ($query as $single){

        // strpos gibt die Position als int zurück, wo ein Sonderzeichen entdeckt wurde
        for($i=0;$i<=6;$i++){ // 6 entspricht dem höchsten Index des search-Array! (array-Zählweise, search hat 7 Einträge)

            $found = strpos($single, $search[$i]);

            // sollte im aktuellen Durchlauf etwas gefunden werden, wird es im Sonderzeichen-Array gespeichert
            if($found != false){
                    $specialCount[] = $found;
            }
        }
    }

    // 2. wenn das specialCount-Array (=Spezialzeichen/Sonderzeichen-Array) Einträge enthält, sind Sonderzeichen vorhanden
    $countSpecialCharacters = count($specialCount);

    // nur dann muss ersetzt werden!
    if($countSpecialCharacters > 0){

        // das soll eingesetzt werden, muss der Reihenfolge des search-Arrays entsprechen!
        $replace 	= array('ue', 'ue', 'oe', 'oe', 'ae', 'ae', 'ss');

        // damit nur eine foreach gebraucht wird, wird hier das query Array überschrieben (ACHTUNG)
        $query = str_replace($search, $replace, $query);
    }

    // hier wird der URL-String gebildet mit oder ohne ausgetauschten sonderzeichen, je nachdem ob Sonderzeichen vorhanden waren oder nicht

    // aus wie vielen Parts besteht das URL-Query?
    $parts = count($query);
    // Schleifendurchläufe zählen
    $runs = 1;
    foreach ($query as $value) {

            if($runs != $parts){
                    $url .= strtolower($value) . '/'; // url komplett in Kleinbuchstaben
            }else{
                    $url .= strtolower($value); // beim letzten URL-Part kein "/" dranhängen
            }
            $runs++;
    }

    return $url; // String
}


