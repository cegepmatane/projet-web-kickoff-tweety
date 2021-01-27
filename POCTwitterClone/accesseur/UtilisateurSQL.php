<?php

interface UtilisateurSQL {
    public const SQL_AJOUTER_ABONNEMENT = "insert into follows(uid, follower) values (:uid, :follower)";
    public const SQL_RETIRER_ABONNEMENT = "delete from follows where uid=:uid and follower=:follower";
    public const SQL_OBTENIR_UTILISATEUR = "select uid from utilisateurs where ip=:ip";
}
