<?php

require_once ('TweetSQL.php');
require_once ('modeles/Tweet.php');

if (!class_exists('Accesseur')) {
    class Accesseur {
        public static $bd = null;

        public static function initialiser(): void {
            $usager = 'root';
            $motdepasse = 'yohann59';
            $hote = 'localhost';
            $base = 'tweety';
            $dsn = 'mysql:dbname=' . $base . ';host=' . $hote;
            TweetDAO::$bd = new PDO($dsn, $usager, $motdepasse);
            TweetDAO::$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }
}

class TweetDAO extends Accesseur implements TweetSQL {

    /** Retourne un array de tous les tweets */
    public static function listerTweets(): array {
        self::initialiser();
        $requete = self::$bd->prepare(self::SQL_OBTENIR_TWEETS);
        $requete->execute();

        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
        $tweets = array();
        foreach ($resultat as $tweet) {
            $tweets[] = new Tweet($tweet);
        }
        return $tweets;
    }

    /** Retourne un array des tweets des utilisateurs suivis */
    public static function listerTweetsSuivis($utilisateur = false): array {
        self::initialiser();
        $requete = self::$bd->prepare(self::SQL_OBTENIR_TWEETS_SUIVIS);
        $requete->bindParam(':uid', $utilisateur, PDO::PARAM_INT);
        $requete->execute();

        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
        $tweets = array();
        foreach ($resultat as $tweet) {
            $tweets[] = new Tweet($tweet);
        }
        return $tweets;
    }

    /** Ajoute un tweet */
    public static function ajouterTweet($tweet): void {
        self::initialiser();

        $uid = $_SESSION['utilisateur']->uid;

        // Enregistrer le tweet
        $date = Date("Y-m-d H:i:s");
        $requete = self::$bd->prepare(self::SQL_AJOUTER_TWEET);
        $requete->bindParam(':uid', $uid, PDO::PARAM_INT);
        $requete->bindParam(':tweet', $tweet, PDO::PARAM_STR);
        $requete->bindParam(':date', $date, PDO::PARAM_STR);
        $requete->bindParam(':uid', $uid, PDO::PARAM_INT);
        $requete->execute();
    }

    /** Retourne true si l'utilisateur suit l'autre utilisateur sinon false*/
    public static function estUnFollower($utilisateur, $follower): bool {
        self::initialiser();

        $requete = self::$bd->prepare(self::SQL_EST_UN_FOLLOWER);
        $requete->bindParam(':uid', $utilisateur, PDO::PARAM_INT);
        $requete->bindParam(':follower', $follower, PDO::PARAM_INT);
        $requete->execute();

        $resultat = $requete->fetch(PDO::FETCH_ASSOC);
        if ($resultat === false) {
            return false;
        }
        return true;
    }

    /** ADMINISTRATION */

    /** Retourne un tweet */
    public static function detaillerTweet($tid) {
        self::initialiser();

        $requete = self::$bd->prepare(self::SQL_DETAILLER_TWEET);
        $requete->bindParam(':tid', $tid, PDO::PARAM_INT);
        $requete->execute();

        $tweet = $requete->fetch(PDO::FETCH_ASSOC);
        return new Tweet($tweet);
    }

    /** Modifie un tweet */
    public static function modifierTweet($tid, $post): void {
        self::initialiser();

        $requete = self::$bd->prepare(self::SQL_MODIFIER_TWEET);
        $requete->bindParam(':tid', $tid, PDO::PARAM_INT);
        $requete->bindParam(':post', $post, PDO::PARAM_STR);
        $requete->execute();
    }

    /** Supprime un tweet */
    public static function supprimerTweet($tid): void {
        self::initialiser();

        $requete = self::$bd->prepare(self::SQL_SUPPRIMER_TWEET);
        $requete->bindParam(':tid', $tid, PDO::PARAM_INT);
        $requete->execute();
    }

    /* PROFIL */
    public function listerTweetsCompte(): array {
        self::initialiser();

        $uid = $_SESSION['utilisateur']->uid;

        $requete = self::$bd->prepare(self::SQL_OBTENIR_TWEETS_COMPTE);
        $requete->bindParam(':uid', $uid, PDO::PARAM_INT);
        $requete->execute();

        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

        $tweets = array();
        foreach ($resultat as $tweet) {
            $tweets[] = new Tweet($tweet);
        }
        return $tweets;
    }
}
