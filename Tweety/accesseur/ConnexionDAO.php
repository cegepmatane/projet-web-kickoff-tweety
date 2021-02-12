<?php
require_once ('ConnexionSQL.php');

if (!class_exists('Accesseur')) {
    class Accesseur {
        public static $bd = null;

        public static function initialiser(): void {
            $usager = 'root';
            $motdepasse = '';
            $hote = 'localhost';
            $base = 'tweety';
            $dsn = 'mysql:dbname=' . $base . ';host=' . $hote;
            ConnexionDAO::$bd = new PDO($dsn, $usager, $motdepasse);
            ConnexionDAO::$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }
}

class ConnexionDAO extends Accesseur implements ConnexionSQL {

    /** Supprime un tweet */
    public static function connexion($uid): void {
        self::initialiser();
        $requete = self::$bd->prepare(self::SQL_CONNEXION); // Retourne True ou False
        $requete->bindParam(':uid', $uid, PDO::PARAM_INT);
        $requete->execute();

        $resultat = $requete->fetch(PDO::FETCH_ASSOC);
        if ($resultat === false) {
        var_dump($resultat);
	header("Location: a_inscription.php");
            return;
        }
        setcookie("user", $uid, time() + (86400 * 2), "/");
        header("Location: index.php");
    }

    public static function obtenirToutLesMembres(): array {
        self::initialiser();

        $requete = self::$bd->prepare(self::SQL_RECUPERER_LISTE_MEMBRES); // Retourne True ou False
        $requete->execute();

        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

        return $resultat;
    }
}
