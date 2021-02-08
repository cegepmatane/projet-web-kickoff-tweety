<?php

interface InscriptionSQL {
    public const SQL_INSCRIPTION = "INSERT INTO `utilisateurs`(`pseudonyme`,`biographie`) VALUES (:pseudonyme,:biographie)";
    public const SQL_DERNIER_INSCRIT = "SELECT MAX(uid) FROM utilisateurs";
}