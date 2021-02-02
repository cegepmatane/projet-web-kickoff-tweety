<?php

interface TweetSQL {
    public const SQL_OBTENIR_TWEETS = "select * from tweets order by date desc";
    public const SQL_OBTENIR_TWEETS_SUIVIS = "select * from tweets where uid in (select follower from follows where uid=:uid) 
        order by date desc";
    public const SQL_AJOUTER_TWEET = "insert into tweets(uid, post, date) values(:uid, :tweet, :date)";
    public const SQL_EST_UN_FOLLOWER = "select follower from follows where uid=:uid and follower=:follower";
    public const SQL_OBTENIR_UTILISATEUR = "select uid from utilisateurs where ip=:ip";
    public const SQL_AJOUTER_UTILISATEUR = "insert into utilisateurs(ip) values (:ip)";

    /** ADMINISTRATION */

    public const SQL_DETAILLER_TWEET = "select * from tweets where tid=:tid";
    public const SQL_MODIFIER_TWEET = "update tweets set post=:post where tid=:tid";
    public const SQL_SUPPRIMER_TWEET = "delete from tweets where tid=:tid";
}
