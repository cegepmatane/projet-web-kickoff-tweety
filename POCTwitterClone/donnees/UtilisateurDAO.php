<?php

require_once ('DAO.php');

class UtilisateurDAO extends DAO {

    /** Abonne l'utilisateur à l'utilisateur spécifié */
    public function ajouterAbonnement($follower): void {
        $follower = $this->filter($follower);
        $utilisateur = $this->obtenirUtilisateur();
        $this->requete("insert into follows(uid, follower) values ('$utilisateur', '$follower')");
    }

    /** Désabonne l'utilisateur de l'utilisateur spécifié */
    public function retirerAbonnement($follower): void {
        $follower = $this->filter($follower);
        $utilisateur = $this->obtenirUtilisateur();
        $this->requete("delete from follows where uid='$utilisateur' and follower='$follower'");
    }

    /** Retourne l'id de l'utilisateur connecté */
    public function obtenirUtilisateur() {
        $ip = $this->filter($_SERVER['REMOTE_ADDR']);
        return $this->getLigne("select uid from utilisateurs where ip='$ip'");
    }
}
