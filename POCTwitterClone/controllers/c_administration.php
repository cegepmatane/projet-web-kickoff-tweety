<?php

require_once ('./donnees/TweetDAO.php');

$tweetDAO = new TweetDAO();

if (isset($_GET['supprimer']) && is_numeric($_GET['supprimer'])) {
    $tweetDAO->supprimerTweet($_GET['supprimer'])   ;
}

$tweetDAO = new TweetDAO();
$tweets = $tweetDAO->obtenirTweets();

// Appel de la vue
require_once ('./vues/v_administration.php');
