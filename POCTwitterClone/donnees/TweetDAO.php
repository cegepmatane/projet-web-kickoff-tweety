<?php

require_once ('DAO.php');
require_once ('./modeles/Tweet.php');

class TweetDAO extends DAO {

    /** Retourne un array de tous les tweets */
    public function obtenirTweets(): array {
        $res = $this->requete("select * from tweets order by date desc");
        $tweets = array();
        while ($tweet = mysqli_fetch_assoc($res)) {
            $suivi = false;
            if ($this->estUnFollower($this->obtenirUtilisateur(), $tweet['uid'])) {
                $suivi = true;
            }
            $tweets[] = new Tweet($tweet['tid'], $tweet['uid'], $tweet['post'], $tweet['date'], $suivi);
        }
        return $tweets;
    }

    /** Retourne un array des tweets des utilisateurs suivis */
    public function obtenirTweetsSuivis($utilisateur = false): array {
        if ($utilisateur === false) {
            $utilisateur = $this->obtenirUtilisateur();
        }
        $res = $this->requete("select * from tweets where uid in (select follower from follows where uid='$utilisateur') 
        order by date desc");
        $tweets = array();
        while ($tweet = mysqli_fetch_assoc($res)) {
            $suivi = false;
            if ($this->estUnFollower($this->obtenirUtilisateur(), $tweet['uid'])) {
                $suivi = true;
            }
            $tweets[] = new Tweet($tweet['tid'], $tweet['uid'], $tweet['post'], $tweet['date'], $suivi);
        }
        return $tweets;
    }

    /** Ajoute un tweet */
    public function ajouterTweet($tweet, $ip): void {
        $tweet = $this->filter($tweet);
        $ip  = $this->filter($ip);
        // Si l'utilisateur qui tweete n'existe pas, le créer
        $utilisateur = $this->obtenirUtilisateur();
        if (!$utilisateur) {
            requete("insert into utilisateurs(ip) values ('$ip')");
        }
        // Enregistrer le tweet
        $date = Date("Y-m-d H:i:s");
        $this->requete("insert into tweets(uid, post, date) values('$utilisateur', '$tweet', '$date')");
    }

    /** Supprimer un tweet */
    public function supprimerTweet($tid): void {
        $this->requete("delete from tweets where tid='".$tid."'");
    }

    /** Retourne true si l'utilisateur suit l'autre utilisateur */
    public function estUnFollower($utilisateur, $follower): bool {
        $utilisateur = $this->filter($utilisateur);
        $follower = $this->filter($follower);
        if ($this->getLigne("select follower from follows where uid='$utilisateur' and follower='$follower'") === null) {
            return false;
        }
        return true;
    }

    /** Retourne l'id de l'utilisateur connecté */
    public function obtenirUtilisateur() {
        $ip = $this->filter($_SERVER['REMOTE_ADDR']);
        return $this->getLigne("select uid from utilisateurs where ip='$ip'");
    }
}
