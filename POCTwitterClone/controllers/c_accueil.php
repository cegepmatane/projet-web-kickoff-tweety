<?php

require_once ('./donnees/TweetDAO.php');

$tweetDAO = new TweetDAO();

if ($_REQUEST['tweet']) {
    // Récupérer le contenu du tweet de l'utilisateur
    $tweet = $_REQUEST['tweet'];
    // Récupérer l'adresse ip de l'utilisateur
    $ip = $_SERVER['REMOTE_ADDR'];

    $tweetDAO->addTweet($tweet, $ip);
}

$tweets = $tweetDAO->getTweets();

$tweetsSuivis = $tweetDAO->getTweetsSuivis();

// Appel de la vue
require_once ('./vues/v_accueil.php');
