<?php

require_once ('bd.php');

abstract class DAO {

    public function __construct() {}

    /** Execute une requête */
    public function requete($requete) {
        global $conn;
        return mysqli_query($conn, $requete);
    }

    /** Renvoie la première ligne d'une requête */
    public function obtenirUnique($requete) {
        $res = $this->requete($requete);
        if ($res->num_rows !== 0) {
            $li = mysqli_fetch_row($res);
            return $li[0];
        }
        return null;
    }

    public function obtenirLigne($requete) {
        $res = $this->requete($requete);
        return mysqli_fetch_assoc($res);
    }

    public function filter($variable) {
        global $conn;
        return mysqli_real_escape_string($conn, $variable);
    }
}

