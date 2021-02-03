<?php

require_once ('UtilisateurSQL.php');

if (!class_exists('Accesseur')) {
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
}

class UtilisateurDAO extends Accesseur implements UtilisateurSQL {

    /** Abonne l'utilisateur à l'utilisateur spécifié */
    public static function ajouterAbonnement($follower): void {
        self::initialiser();

        $utilisateur = self::obtenirUtilisateur();

        $requete = self::$bd->prepare(self::SQL_AJOUTER_ABONNEMENT);
        $requete->bindParam(':uid', $utilisateur, PDO::PARAM_INT);
        $requete->bindParam(':follower', $follower, PDO::PARAM_INT);
        $requete->execute();
    }

    /** Désabonne l'utilisateur connecté de l'utilisateur spécifié */
    public static function retirerAbonnement($follower): void {
        self::initialiser();

        $utilisateur = self::obtenirUtilisateur();

        $requete = self::$bd->prepare(self::SQL_RETIRER_ABONNEMENT);
        $requete->bindParam(':uid', $utilisateur, PDO::PARAM_INT);
        $requete->bindParam(':follower', $follower, PDO::PARAM_INT);
        $requete->execute();
    }

    /** Retourne l'id de l'utilisateur connecté */
    public static function obtenirUtilisateur() {
        self::initialiser();

        $ip = $_SERVER['REMOTE_ADDR'];

        $requete = self::$bd->prepare(self::SQL_OBTENIR_UTILISATEUR);
        $requete->bindParam(':ip', $ip, PDO::PARAM_STR);
        $requete->execute();

        return $requete->fetch(PDO::FETCH_ASSOC);
    }

}
