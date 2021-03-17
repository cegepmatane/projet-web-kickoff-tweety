<?php

interface UtilisateurSQL {
    public const SQL_AJOUTER_ABONNEMENT = "INSERT INTO follows(uid, follower) VALUES (:uid, :follower)";
    public const SQL_RETIRER_ABONNEMENT = "DELETE FROM follows WHERE uid=:uid AND follower=:follower";
    public const SQL_OBTENIR_UTILISATEUR = "SELECT * FROM utilisateurs WHERE nomutilisateur=:nomutilisateur";
    public const SQL_OBTENIR_NOMUTILISATEUR = "SELECT nomutilisateur FROM utilisateurs WHERE uid=:uid";
    public const SQL_OBTENIR_BIOGRAPHIE = "SELECT biographie FROM utilisateurs WHERE uid=:uid";
    public const SQL_INSCRIRE_UTILISATEUR = "INSERT INTO utilisateurs(nomutilisateur, email, motdepasse) values(:nomutilisateur, :email, :motdepasse)";
    public const SQL_OBTENIR_NOMSUTILISATEURS = "SELECT nomutilisateur FROM utilisateurs WHERE nomutilisateur=:nomutilisateur";
    public const SQL_MODIFIER_PROFIL = "UPDATE utilisateurs SET nomutilisateur=:nomutilisateur, biographie =:biographie  WHERE uid=:uid";
    public const SQL_EMAIL_EXISTANT = "SELECT email FROM `utilisateurs` WHERE email=:email";
}
