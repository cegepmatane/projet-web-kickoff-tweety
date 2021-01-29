<?php

require_once ('./donnees/TweetDAO.php');

$tweetDAO = new TweetDAO();

// Modification du tweet
if (!empty($_REQUEST['tweet']) && isset($_GET['tid']) && is_numeric($_GET['tid'])) {
    $tweetDAO->modifierTweet($_GET['tid'], $_REQUEST['tweet']);
}

// Affichage du tweet
if (isset($_GET['tid']) && is_numeric($_GET['tid'])) {
    $tweet = $tweetDAO->detaillerTweet($_GET['tid']);
}

// Appel de la vue
require_once('./vues/modifier.php');
