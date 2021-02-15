<?php

interface TweetSQL {
    public const SQL_OBTENIR_TWEETS = "SELECT * FROM tweets ORDER BY date DESC";
    public const SQL_OBTENIR_TWEETS_SUIVIS = "SELECT * FROM tweets WHERE uid IN(SELECT follower FROM follows WHERE uid=:uid) 
        ORDER BY date DESC";
    public const SQL_AJOUTER_TWEET = "INSERT INTO tweets(uid, post, date, pseudonyme) SELECT :uid, :tweet, :date, utilisateurs.pseudonyme FROM utilisateurs WHERE utilisateurs.uid=:uid";
    public const SQL_EST_UN_FOLLOWER = "SELECT follower FROM follows WHERE uid=:uid and follower=:follower";
    public const SQL_OBTENIR_UTILISATEUR = "SELECT uid FROM utilisateurs WHERE ip=:ip";
    public const SQL_AJOUTER_UTILISATEUR = "INSERT INTO utilisateurs(ip) VALUES (:ip)";

    /** ADMINISTRATION */

    public const SQL_DETAILLER_TWEET = "SELECT * FROM tweets WHERE tid=:tid";
    public const SQL_MODIFIER_TWEET = "UPDATE tweets SET post=:post WHERE tid=:tid";
    public const SQL_SUPPRIMER_TWEET = "delete FROM tweets WHERE tid=:tid";
}
