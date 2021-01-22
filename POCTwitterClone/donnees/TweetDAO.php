<?php

require_once ('DAO.php');
require_once ('./modeles/Tweet.php');

class TweetDAO extends DAO {

    public function getTweets(): array {
        $res = $this->requete("select * from tweets order by date desc");
        $tweets = array();
        while ($tweet = mysqli_fetch_assoc($res)) {
            $tweets[] = new Tweet($tweet['tid'], $tweet['uid'], $tweet['post'], $tweet['date']);
        }
        return $tweets;
    }
}
