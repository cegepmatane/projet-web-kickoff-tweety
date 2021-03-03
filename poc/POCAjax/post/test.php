<?php

$nom = (isset($_POST['nom'])) ? $_POST['nom'] : 'anonyme';
$computedString = 'Bonjour, ' . $nom . ' !';
$array = ['nom' => $nom, 'computedString' => $computedString];
echo json_encode($array);