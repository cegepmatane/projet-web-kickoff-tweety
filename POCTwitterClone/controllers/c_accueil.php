<?php

require_once ('./donnees/TweetDAO.php');

$tweetDAO = new TweetDAO();

$tweets = $tweetDAO->getTweets();

// Appel de la vue
require_once ('./vues/v_accueil.php');
