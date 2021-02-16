<?php

if (!empty($_POST['action-connecter'])) {
    if (isset($_POST['nomutilisateur'], $_POST['motdepasse'])
        && !empty($_POST['nomutilisateur']) && !empty($_POST['motdepasse'])) {
        require_once ('action/a_connecter.php');
    }
}

if (!empty($_POST['action-deconnecter'])) {
    require_once ('action/a_deconnecter.php');
}
