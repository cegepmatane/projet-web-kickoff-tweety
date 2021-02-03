<?php

require_once ('UtilisateurSQL.php');
require_once ('TweetSQL.php');


if (!class_exists('Accesseur')) {
    class Accesseur {
            public static $bd = null;

            public static function initialiser(): void {
                $usager = 'root';
                $motdepasse = '';
                $hote = 'localhost';
                $base = 'POCPageProfil';
                $dsn = 'mysql:dbname=' . $base . ';host=' . $hote;
                UtilisateurDAO::$bd = new PDO($dsn, $usager, $motdepasse);
                UtilisateurDAO::$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        }
}




class UtilisateurDAO extends Accesseur implements UtilisateurSQL {

    /** Abonne l'utilisateur à l'utilisateur spécifié */
    public function ajouterAbonnement($follower): void {
        self::initialiser();

        $utilisateur = $this->obtenirUtilisateur();

        $requete = self::$bd->prepare(self::SQL_AJOUTER_ABONNEMENT);
        $requete->bindParam(':uid', $utilisateur, PDO::PARAM_INT);
        $requete->bindParam(':follower', $follower, PDO::PARAM_INT);
        $requete->execute();
    }

    /** Désabonne l'utilisateur connecté de l'utilisateur spécifié */
    public function retirerAbonnement($follower): void {
        self::initialiser();

        $utilisateur = $this->obtenirUtilisateur();

        $requete = self::$bd->prepare(self::SQL_RETIRER_ABONNEMENT);
        $requete->bindParam(':uid', $utilisateur, PDO::PARAM_INT);
        $requete->bindParam(':follower', $follower, PDO::PARAM_INT);
        $requete->execute();
    }


    public function obtenirBiographie($utilisateur = false) {
        self::initialiser();
        if($utilisateur === false) $utilisateur = $this->obtenirUtilisateur();
        $utilisateur = $this->obtenirUtilisateur();

        $requete = self::$bd->prepare(self::SQL_OBTENIR_BIOGRAPHIE);
        $requete->bindParam(':uid', $utilisateur, PDO::PARAM_INT);

        $requete->execute();

        $resultat = $requete->fetch(PDO::FETCH_ASSOC);

        if($resultat){
            return $resultat["biographie"];
        }
        return "Erreur";
    }

    public function obtenirPseudonyme($utilisateur = false) {
        self::initialiser();
        if($utilisateur === false) $utilisateur = $this->obtenirUtilisateur();

        $requete = self::$bd->prepare(self::SQL_OBTENIR_PSEUDONYME);
        $requete->bindParam(':uid', $utilisateur, PDO::PARAM_INT);

        $requete->execute();

        $resultat = $requete->fetch(PDO::FETCH_ASSOC);

        if($resultat){
            return $resultat["pseudonyme"];
        }

    }

    public function suitUtilisateur($uid) {
        self::initialiser();
        $utilisateur = $this->obtenirUtilisateur();
        $requete = self::$bd->prepare(self::SQL_SUIT_UTILISATEUR);
        $requete->bindParam(':uid', $uid, PDO::PARAM_INT);
        $requete->bindParam(':follower', $utilisateur, PDO::PARAM_INT);
        $requete->execute();

        $resultat = $requete->fetch(PDO::FETCH_ASSOC);

    }
    /** Retourne l'id de l'utilisateur connecté */
    public function obtenirUtilisateur() {
        self::initialiser();

        $ip = $_SERVER['REMOTE_ADDR']; // Censé renvoyer adresse IP mais renvoie une version raccourci (::1), TODO : Corriger

        $ip = "127.0.0.1"; // Je force l'addresse IP en attendant de fix

        $requete = self::$bd->prepare(self::SQL_OBTENIR_UTILISATEUR);
        $requete->bindParam(':ip', $ip, PDO::PARAM_STR);
        $requete->execute();

        return $requete->fetch(PDO::FETCH_ASSOC);
    }

}
