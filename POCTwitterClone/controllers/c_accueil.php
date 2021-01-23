<?php

require_once ('./donnees/TweetDAO.php');
require_once ('./donnees/UtilisateurDAO.php');

$tweetDAO = new TweetDAO();
$utilisateurDAO = new UtilisateurDAO();

if (!empty($_REQUEST['tweet'])) {
    $tweetDAO->ajouterTweet($_REQUEST['tweet'], $_SERVER['REMOTE_ADDR']);
}

if (!empty($_REQUEST['follow'])) {
    $utilisateurDAO->ajouterAbonnement($_REQUEST['follow']);
}

if (!empty($_REQUEST['unfollow'])) {
    $utilisateurDAO->retirerAbonnement($_REQUEST['unfollow']);
}

$tweets = $tweetDAO->obtenirTweets();

$tweetsSuivis = $tweetDAO->obtenirTweetsSuivis();

// Appel de la vue
require_once ('./vues/v_accueil.php');
