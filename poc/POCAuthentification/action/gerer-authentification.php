<?php

if (!empty($_POST['action-connecter'])) {
    if (isset($_POST['nomutilisateur'], $_POST['motdepasse'])
        && !empty($_POST['nomutilisateur']) && !empty($_POST['motdepasse'])) {
        require_once ('action/a_connecter.php');
    }
}

if (!empty($_POST['action-inscrire'])) {
    if (isset($_POST['nomutilisateur'], $_POST['email'] ,$_POST['motdepasse'], $_POST['confirmation-motdepasse'])
    && !empty($_POST['nomutilisateur']) && !empty($_POST['email']) && !empty($_POST['motdepasse']) && !empty($_POST['confirmation-motdepasse'])) {
        require_once ('action/a_inscrire.php');
    }
}

if (!empty($_POST['action-deconnecter'])) {
    require_once ('action/a_deconnecter.php');
}
