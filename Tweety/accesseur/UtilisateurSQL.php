<?php

interface UtilisateurSQL {
    public const SQL_AJOUTER_ABONNEMENT = "INSERT INTO follows(uid, follower) VALUES (:uid, :follower)";
    public const SQL_RETIRER_ABONNEMENT = "DELETE FROM follows WHERE uid=:uid AND follower=:follower";
    public const SQL_OBTENIR_UTILISATEUR = "SELECT uid FROM utilisateurs WHERE ip=:ip";
    public const SQL_OBTENIR_PSEUDONYME = "SELECT pseudonyme FROM utilisateurs WHERE uid=:uid";
    public const SQL_OBTENIR_BIOGRAPHIE = "SELECT biographie FROM utilisateurs WHERE uid=:uid";
    //public const SQL_MODFIER_PSEUDONYME = "UPDATE utilisateurs SET pseudonyme =:pseudonyme  WHERE uid = uid=:uid";
    //public const SQL_MODFIER_BIOGRAPHIE = "UPDATE utilisateurs SET biographie =:biographie  WHERE uid = uid=:uid";
    public const SQL_MODIFIER_PROFIL = "UPDATE utilisateurs SET pseudonyme=:pseudonyme, biographie =:biographie  WHERE uid=:uid";
}
