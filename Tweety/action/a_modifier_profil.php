<?php

if ($_POST['nomutilisateur'] === "") {
    $nomutilisateur = $_SESSION['utilisateur']->nomutilisateur;
} else {
    $nomutilisateur = $_POST['nomutilisateur'];
}

if ($_POST['biographie'] === "") {
    $biographie = $_SESSION['utilisateur']->biographie;
} else {
    $biographie = $_POST['biographie'];
}

UtilisateurDAO::modifierProfil($nomutilisateur, $biographie);

$_SESSION['utilisateur'] = UtilisateurDAO::obtenirUtilisateur($_POST['nomutilisateur']);
