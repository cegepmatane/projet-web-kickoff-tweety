<?php

interface UtilisateurSQL {
    public const SQL_AJOUTER_ABONNEMENT = "INSERT INTO follows(uid, follower) VALUES (:uid, :follower)";
    public const SQL_RETIRER_ABONNEMENT = "DELETE FROM follows WHERE uid=:uid AND follower=:follower";
    public const SQL_OBTENIR_UTILISATEUR = "SELECT * FROM utilisateurs WHERE nomutilisateur=:nomutilisateur";
    public const SQL_OBTENIR_NOMUTILISATEUR = "SELECT nomutilisateur FROM utilisateurs WHERE uid=:uid";
    public const SQL_OBTENIR_BIOGRAPHIE = "SELECT biographie FROM utilisateurs WHERE uid=:uid";
}
