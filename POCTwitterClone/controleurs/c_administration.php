<?php

require_once ('./donnees/TweetDAO.php');

$tweetDAO = new TweetDAO();

$tweets = $tweetDAO->listerTweets();

// Appel de la vue
require_once ('./vues/v_administration.php');
