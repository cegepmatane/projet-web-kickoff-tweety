<?php

require_once ('UtilisateurSQL.php');
require_once ('modeles/Utilisateur.php');

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

        $uid = $_SESSION['utilisateur']->uid;

        $requete = self::$bd->prepare(self::SQL_AJOUTER_ABONNEMENT);
        $requete->bindParam(':uid', $uid, PDO::PARAM_INT);
        $requete->bindParam(':follower', $follower, PDO::PARAM_INT);
        $requete->execute();
    }

    /** Désabonne l'utilisateur connecté de l'utilisateur spécifié */
    public static function retirerAbonnement($follower): void {
        self::initialiser();

        $uid = $_SESSION['utilisateur']->uid;

        $requete = self::$bd->prepare(self::SQL_RETIRER_ABONNEMENT);
        $requete->bindParam(':uid', $uid, PDO::PARAM_INT);
        $requete->bindParam(':follower', $follower, PDO::PARAM_INT);
        $requete->execute();
    }

    public static function obtenirNomutilisateur($uid = false): string {
        self::initialiser();
        if ($uid === false) $uid = $_SESSION['utilisateur']->uid;

        $requete = self::$bd->prepare(self::SQL_OBTENIR_NOMUTILISATEUR);
        $requete->bindParam(':uid', $uid, PDO::PARAM_INT);

        $requete->execute();

        $resultat = $requete->fetch(PDO::FETCH_ASSOC);

        if($resultat){
            return $resultat["nomutilisateur"];
        }
        return "erreur";
    }

    public static function obtenirBiographie($uid = false): string {
        self::initialiser();
        if ($uid === false) $uid = $_SESSION['utilisateur']->uid;

        $requete = self::$bd->prepare(self::SQL_OBTENIR_BIOGRAPHIE);
        $requete->bindParam(':uid', $uid, PDO::PARAM_INT);

        $requete->execute();

        $resultat = $requete->fetch(PDO::FETCH_ASSOC);

        if($resultat){
            return $resultat["biographie"];
        }
        return "erreur";
    }

    /** Retourne un objet utilisateur */
    public static function obtenirUtilisateur($nomutilisateur) {
        self::initialiser();

        $requete = self::$bd->prepare(self::SQL_OBTENIR_UTILISATEUR);
        $requete->bindParam('nomutilisateur', $nomutilisateur, PDO::PARAM_STR);

        $requete->execute();

        $resultat = $requete->fetch(PDO::FETCH_ASSOC);

        if ($resultat) {
            return new Utilisateur($resultat);
        }
        return null;
    }

    public static function inscrireUtilisateur($nomutilisateur, $email, $motdepasse) {
        self::initialiser();

        // Vérifier si le nom d'utilisateur n'est pas déjà utilisée
        $requete = self::$bd->prepare(self::SQL_OBTENIR_NOMSUTILISATEURS);
        $requete->bindParam('nomutilisateur', $nomutilisateur, PDO::PARAM_STR);
        $requete->execute();
        $resultat = $requete->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            return null;
        }

        // Inscrire l'utilisateur
        $requete = self::$bd->prepare(self::SQL_INSCRIRE_UTILISATEUR);
        $requete->bindParam('nomutilisateur', $nomutilisateur, PDO::PARAM_STR);
        $requete->bindParam('email', $email, PDO::PARAM_STR);
        $motdepasse = password_hash($motdepasse, PASSWORD_BCRYPT);
        $requete->bindParam('motdepasse', $motdepasse, PDO::PARAM_STR);
        $requete->execute();
        return true;
    }

    /* Modifier Profil */
    public static function modifierProfil($nomutilisateur, $biographie, $uid = false)
    {
        self::initialiser();
        if ($uid === false) $uid = $_SESSION['utilisateur']->uid;

        $requeteModifierProfil = self::$bd->prepare(self::SQL_MODIFIER_PROFIL);
        $requeteModifierProfil->bindParam(':uid', $uid, PDO::PARAM_INT);
        $requeteModifierProfil->bindValue(':nomutilisateur', $nomutilisateur, PDO::PARAM_STR);
        $requeteModifierProfil->bindValue(':biographie', $biographie, PDO::PARAM_STR);

        $requeteModifierProfil->execute();
    }

    /*Obtenir Email*/
    public static function obtenirEmail($email)
    {
        $requete = self::$bd->prepare(self::SQL_EMAIL_EXISTANT);
        $requete->bindParam('email', $email, PDO::PARAM_STR);
        $requete->execute();
        $resultat = $requete->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            echo($resultat);
            return $resultat["email"];
        }
        return "erreur";
    }
}
