<?php

$a[] = "Maxime";
$a[] = "Kenny";
$a[] = "Gabriel";
$a[] = "Esteban";
$a[] = "Yvong";
$a[] = "Lucas";
$a[] = "Thomas";
$a[] = "Yohann";
$a[] = "Yann";
// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}


echo $hint === "" ? "pas de suggestion" : $hint;
?>