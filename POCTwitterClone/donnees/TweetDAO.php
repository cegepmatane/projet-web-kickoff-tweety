<?php

require_once ('DAO.php');
require_once ('./modeles/Tweet.php');

class TweetDAO extends DAO {

    /** Retourne un array de tous les tweets */
    public function getTweets(): array {
        $res = $this->requete("select * from tweets order by date desc");
        $tweets = array();
        while ($tweet = mysqli_fetch_assoc($res)) {
            $suivi = false;
            if ($this->estUnFollower($this->getUid(), $tweet['uid'])) {
                $suivi = true;
            }
            $tweets[] = new Tweet($tweet['tid'], $tweet['uid'], $tweet['post'], $tweet['date'], $suivi);
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
            $suivi = false;
            if ($this->estUnFollower($this->getUid(), $tweet['uid'])) {
                $suivi = true;
            }
            $tweets[] = new Tweet($tweet['tid'], $tweet['uid'], $tweet['post'], $tweet['date'], $suivi);
        }
        return $tweets;
    }

    /** Ajoute un tweet */
    public function addTweet($tweet, $ip): void {
        global $conn;
        $tweet = mysqli_real_escape_string($conn, $tweet);
        $ip  = mysqli_real_escape_string($conn, $ip);
        // Si l'utilisateur qui tweete n'existe pas, le créer
        $uid = $this->getUid();
        if (!$uid) {
            requete("insert into utilisateurs(ip) values ('$ip')");
        }
        // Enregistrer le tweet
        $date = Date("Y-m-d H:i:s");
        $this->requete("insert into tweets(uid, post, date) values('$uid', '$tweet', '$date')");
    }

    /** Retourne true si l'utilisateur suit l'autre utilisateur */
    public function estUnFollower($utilisateur, $follower): bool {
        if ($this->getLigne("select follower from follows where uid='$utilisateur' and follower='$follower'") === null) {
            return false;
        }
        return true;
    }

    /** Retourne l'id de l'utilisateur connecté */
    public function getUid() {
        global $conn;
        $ip = mysqli_real_escape_string($conn, $_SERVER['REMOTE_ADDR']);
        return $this->getLigne("select uid from utilisateurs where ip='$ip'");
    }
}
