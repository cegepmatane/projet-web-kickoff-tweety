<?php

$utilisateur = UtilisateurDAO::obtenirUtilisateur($_POST['nomutilisateur']);

if ($utilisateur && password_verify($_POST['motdepasse'], $utilisateur->motdepasse)) {
    initialiser_session();
    $_SESSION['utilisateur'] = $utilisateur;
    header('Location: accueil.php');
} else {
        $erreur = "connexion_echouee";
}
