<?php

require_once ('./donnees/TweetDAO.php');

$tweetDAO = new TweetDAO();

if (isset($_GET['tid']) && is_numeric($_GET['tid'])) {
    $tweet = $tweetDAO->detaillerTweet($_GET['tid']);
}

// Appel de la vue
require_once ('./vues/v_modifier.php');
