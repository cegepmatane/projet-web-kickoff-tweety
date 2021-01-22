<?php

$tweets = array();
$tweets[0]->uid = 1;
$tweets[0]->post = 'Ceci est un tweet';
$tweets[0]->date = '2021-01-21 00:49:38';
$tweets[1]->uid = 1;
$tweets[1]->post = 'Ceci est autre un tweet';
$tweets[1]->date = '2021-01-21 00:51:24';

// Appel de la vue
require_once ('./vues/v_accueil.php');
