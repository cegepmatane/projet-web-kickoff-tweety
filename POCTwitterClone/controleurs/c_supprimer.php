<?php

require_once ('./donnees/TweetDAO.php');

$tweetDAO = new TweetDAO();

if (isset($_GET['tid']) && is_numeric($_GET['tid'])) {
    $tweetDAO->supprimerTweet($_GET['tid'])   ;
}

require_once('./controleurs/c_administration.php');
