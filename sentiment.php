<?php

$positieveWoorden = convertFileToArray("positive-words.txt");
$neutraleWoorden = convertFileToArray("neutral-words.txt");
$negatieveWoorden = convertFileToArray("negative-words.txt");
$lyrics = file_get_contents("lyrics.txt");
$lyrics = str_replace("\n", " ", $lyrics);
$lyrics = explode(" ", $lyrics);

function convertFileToArray($file) {
    $array = file_get_contents($file);
    $array = explode("\n", $array);
    return $array;
}

$positieveWoorden;
$neutraleWoorden;
$negatieveWoorden;
$lyrics;
$countNegative;
$countNeutral;
$countPositive;
foreach($lyrics as $check_able){
    if(in_array($check_able, $positieveWoorden)){$countPositive++;}
    if(in_array($check_able, $neutraleWoorden)){$countNeutral++;}
    if(in_array($check_able, $negatieveWoorden)){$countNegative++;}
}
$that_feel = round(($countNeutral + $countPositive - $countNegative) / $countNeutral, 2);

echo"Positieve woorden: $countPositive".PHP_EOL;
echo"Neutrale woorden: $countNeutral".PHP_EOL;
echo"Negatieve woorden: $countNegative".PHP_EOL;
echo"Het sentiment van de tekst krijgt een score van: $that_feel".PHP_EOL;