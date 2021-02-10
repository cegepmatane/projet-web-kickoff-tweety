<?php

interface ConnexionSQL {
    public const SQL_CONNEXION = "SELECT uid FROM utilisateurs WHERE uid=:uid";
    public const SQL_RECUPERER_LISTE_MEMBRES = "SELECT uid, pseudonyme FROM utilisateurs ORDER BY uid";
}
