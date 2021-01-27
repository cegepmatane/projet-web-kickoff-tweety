<?php

require_once ('UtilisateurSQL.php');

class Accesseur {
    public static $bd = null;

    public static function initialiser(): void {
        $usager = 'root';
        $motdepasse = '';
        $hote = 'localhost';
        $base = 'poctwitterclone';
        $dsn = 'mysql:dbname=' . $base . ';host=' . $hote;
        UtilisateurDAO::$bd = new PDO($dsn, $usager, $motdepasse);
        UtilisateurDAO::$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}

class UtilisateurDAO extends Accesseur implements UtilisateurSQL {

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
