<?php

require_once ('./donnees/TweetDAO.php');
require_once ('./donnees/UtilisateurDAO.php');

$tweetDAO = new TweetDAO();
$utilisateurDAO = new UtilisateurDAO();

// Ajout du tweet
if (!empty($_REQUEST['tweet'])) {
    $tweetDAO->ajouterTweet($_REQUEST['tweet'], $_SERVER['REMOTE_ADDR']);
}

// Ajout de l'abonnement
if (!empty($_REQUEST['follow'])) {
    $utilisateurDAO->ajouterAbonnement($_REQUEST['follow']);
}

// Suppression de l'abonnement
if (!empty($_REQUEST['unfollow'])) {
    $utilisateurDAO->retirerAbonnement($_REQUEST['unfollow']);
}

$tweets = $tweetDAO->listerTweets();

$tweetsSuivis = $tweetDAO->listerTweetsSuivis();

// Appel de la vue
require_once('./vues/old.accueil.php');
