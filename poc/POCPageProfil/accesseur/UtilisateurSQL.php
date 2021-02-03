<?php

interface UtilisateurSQL {
    public const SQL_AJOUTER_ABONNEMENT = "insert into follows(uid, follower) values (:uid, :follower)";
    public const SQL_RETIRER_ABONNEMENT = "delete from follows where uid=:uid and follower=:follower";
    public const SQL_OBTENIR_UTILISATEUR = "select uid from utilisateurs where ip=:ip";
    public const SQL_OBTENIR_BIOGRAPHIE = "select biographie from utilisateurs where uid=:uid";
    public const SQL_OBTENIR_PSEUDONYME = "select pseudonyme from utilisateurs where uid=:uid";
    public const SQL_SUIT_UTILISATEUR = "SELECT * FROM follows WHERE uid=:uid AND follower=:follower";
}
