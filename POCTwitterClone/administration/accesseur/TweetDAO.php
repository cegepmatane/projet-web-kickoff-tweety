<?php

require_once ('TweetSQL.php');
require_once ('./modeles/Tweet.php');

class Accesseur {
    public static $bd = null;

    public static function initialiser(): void {
        $usager = 'root';
        $motdepasse = '';
        $hote = 'localhost';
        $base = 'poctwitterclone';
        $dsn = 'mysql:dbname=' . $base . ';host=' . $hote;
        TweetDAO::$bd = new PDO($dsn, $usager, $motdepasse);
        TweetDAO::$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}

class TweetDAO extends Accesseur implements TweetSQL {

    /** Retourne un tweet */
    public function detaillerTweet($tid) {
        self::initialiser();

        $requete = self::$bd->prepare(self::SQL_DETAILLER_TWEET);
        $requete->bindParam(':tid', $tid, PDO::PARAM_INT);
        $requete->execute();

        $tweet = $requete->fetch(PDO::FETCH_ASSOC);
        return new Tweet($requete['tid'], $requete['uid'], $requete['post'], $requete['date'], null);
    }

}
