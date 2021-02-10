<?php

require_once ('UtilisateurSQL.php');

if (!class_exists('Accesseur')) {
    class Accesseur {
        public static $bd = null;

        public static function initialiser(): void {
            $usager = 'root';
            $motdepasse = 'yohann59';
            $hote = 'localhost';
            $base = 'tweety';
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

    public static function obtenirPseudonyme($utilisateur = false) {
        self::initialiser();
        if($utilisateur === false) $utilisateur = UtilisateurDAO::obtenirUtilisateur();

        $requete = self::$bd->prepare(self::SQL_OBTENIR_PSEUDONYME);
        $requete->bindParam(':uid', $utilisateur, PDO::PARAM_INT);

        $requete->execute();

        $resultat = $requete->fetch(PDO::FETCH_ASSOC);

        if($resultat){
            return $resultat["pseudonyme"];
        }
        return "Erreur";
    }

    public static function obtenirBiographie($utilisateur = false) {
        self::initialiser();
        if($utilisateur === false) $utilisateur = UtilisateurDAO::obtenirUtilisateur();
        //$utilisateur = $this->obtenirUtilisateur();

        $requete = self::$bd->prepare(self::SQL_OBTENIR_BIOGRAPHIE);
        $requete->bindParam(':uid', $utilisateur, PDO::PARAM_INT);

        $requete->execute();

        $resultat = $requete->fetch(PDO::FETCH_ASSOC);

        if($resultat){
            return $resultat["biographie"];
        }
        return "Erreur";
    }

    /** Retourne l'id de l'utilisateur connecté */
    public static function obtenirUtilisateur() {
        self::initialiser();
        if(isset($_COOKIE["user"])) {
            return $_COOKIE["user"];
        } else {
            header("Location: connexion.php");
        }
    }

}
