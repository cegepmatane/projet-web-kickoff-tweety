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

    /** Retourne un array des tweets des utilisateurs suivis */
    public function getTweetsSuivis($utilisateur = false): array {
        if ($utilisateur === false) {
            $utilisateur = $this->getUid();
        }
        $res = $this->requete("select * from tweets where uid in (select follower from follows where uid='$utilisateur') 
        order by date desc");
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
