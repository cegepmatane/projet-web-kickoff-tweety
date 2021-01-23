<?php

require_once ('./donnees/TweetDAO.php');
require_once ('./donnees/UtilisateurDAO.php');

$tweetDAO = new TweetDAO();
$utilisateurDAO = new UtilisateurDAO();

if (!empty($_REQUEST['tweet'])) {
    // Récupérer le contenu du tweet de l'utilisateur
    $tweet = $_REQUEST['tweet'];
    // Récupérer l'adresse ip de l'utilisateur
    $ip = $_SERVER['REMOTE_ADDR'];

    $tweetDAO->ajouterTweet($tweet, $ip);
}

if (!empty($_REQUEST['follow'])) {
    var_dump('hey');
    $utilisateurDAO->ajouterAbonnement($_REQUEST['follow']);
}

$tweets = $tweetDAO->obtenirTweets();

$tweetsSuivis = $tweetDAO->obtenirTweetsSuivis();

// Appel de la vue
require_once ('./vues/v_accueil.php');
