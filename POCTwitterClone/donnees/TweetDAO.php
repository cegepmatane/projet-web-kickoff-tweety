<?php

require_once ('DAO.php');
require_once ('./modeles/Tweet.php');

class TweetDAO extends DAO {

    /** Retourne un array de tous les tweets */
    public function getTweets(): array {
        $res = $this->requete("select * from tweets order by date desc");
        $tweets = array();
        while ($tweet = mysqli_fetch_assoc($res)) {
            $tweets[] = new Tweet($tweet['tid'], $tweet['uid'], $tweet['post'], $tweet['date']);
        }
        return $tweets;
    }

    /** Retourne l'id de l'utilisateur connecté */
    public function getUid() {
        global $conn;
        $ip = mysqli_real_escape_string($conn, $_SERVER['REMOTE_ADDR']);
        return $this->getLigne("select uid from utilisateurs where ip='$ip'");
    }
}
