<?php

$tweet = TweetDAO::ajouterTweet($_POST['tweet']);

// Cacher le tweet ajouté
if ($tweet->uid === $_SESSION['utilisateur']->uid && apcu_exists('tweets_utilisateur')) {
        $tweets = apcu_fetch('tweets_utilisateur');
        array_push($tweets, $tweet);
        apcu_store('tweets_utilisateur', $tweets);
}

