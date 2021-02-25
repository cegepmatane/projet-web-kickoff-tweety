<?php

$utilisateur = UtilisateurDAO::obtenirUtilisateur($_POST['nomutilisateur']);

// Vérifier si le mot de passe renseigné
if ($utilisateur && password_verify($_POST['motdepasse'], $utilisateur->motdepasse)) {
    // Connecter l'utilisateur
    apcu_clear_cache();
    initialiser_session();
    $_SESSION['utilisateur'] = $utilisateur;
    header('Location: accueil.php');

} else {
    $erreur = "connexion_echouee";
}
