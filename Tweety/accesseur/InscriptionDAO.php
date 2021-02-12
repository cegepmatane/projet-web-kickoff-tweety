<?php
require_once ('InscriptionSQL.php');

if (!class_exists('Accesseur')) {
    class Accesseur {
        public static $bd = null;

        public static function initialiser(): void {
            $usager = 'root';
            $motdepasse = '';
            $hote = '';
            $base = 'tweety';
            $dsn = 'mysql:dbname=' . $base . ';host=' . $hote;
            InscriptionDAO::$bd = new PDO($dsn, $usager, $motdepasse);
            InscriptionDAO::$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }
}

class InscriptionDAO extends Accesseur implements InscriptionSQL {

    /** Supprime un tweet */
    public static function inscription($pseudonyme, $biographie): void {
        self::initialiser();

        $requete = self::$bd->prepare(self::SQL_INSCRIPTION);
        $requete->bindParam(':pseudonyme', $pseudonyme, PDO::PARAM_STR);
        $requete->bindParam(':biographie', $biographie, PDO::PARAM_STR);

        $requete->execute();

        $requete = self::$bd->prepare(self::SQL_DERNIER_INSCRIT); // Retourne le dernier UID créé

        $requete->execute();

        $resultat = $requete->fetch(PDO::FETCH_ASSOC);

        if ($resultat === false) {
            header("Location: a_inscription.php");
            return;
        }

        foreach($resultat as $uid)
        setcookie("user", $uid, time() + (86400 * 2), "/");
        header("Location: index.php");
    }

}
