<?php

require_once ('../accesseur/UtilisateurDAO.php');

// Ajout de l'abonnement
if (!empty($_GET['uid'])) {
    UtilisateurDAO::ajouterAbonnement($_GET['uid']);
}

