<?php

interface TweetSQL {
    public const SQL_DETAILLER_TWEET = "select * from tweets where tid=:tid";
    public const SQL_MODIFIER_TWEET = "update tweets set post=:post where tid=:tid";
    public const SQL_SUPPRIMER_TWEET = "delete from tweets where tid=:tid";
}