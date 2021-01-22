<?php

require_once ('DAO.php');

class UtilisateurDAO extends DAO {

    /** Retourne true si l'utilisateur suit l'autre utilisateur */
    public function estUnFollower($follower, $utilisateur): bool {
        
        if (!$this->getLigne("select follower from follows where uid='$utilisateur' and follower='$follower'")) {
            return false;
        }
        return true;
    }
}
