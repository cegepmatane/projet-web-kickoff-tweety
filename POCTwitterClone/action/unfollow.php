<?php

require_once ('../accesseur/UtilisateurDAO.php');

// Ajout de l'abonnement
if (!empty($_GET['uid'])) {
    UtilisateurDAO::retirerAbonnement($_GET['uid']);
}

require_once('../vues/accueil.php');
