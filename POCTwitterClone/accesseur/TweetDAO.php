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

    /** Retourne l'id de l'utilisateur connecté */
    public function obtenirUtilisateur() {
        self::initialiser();

        $ip = $_SERVER['REMOTE_ADDR'];

        $requete = self::$bd->prepare(self::SQL_OBTENIR_UTILISATEUR);
        $requete->bindParam(':ip', $ip, PDO::PARAM_STR);
        $requete->execute();

        return $requete->fetch(PDO::FETCH_ASSOC);
    }

}
