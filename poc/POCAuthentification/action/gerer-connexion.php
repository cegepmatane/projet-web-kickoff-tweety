<?php

if (!empty($_POST['action-connecter'])) {
    if (isset($_POST['nomutilisateur'], $_POST['motdepasse'])
        && !empty($_POST['nomutilisateur']) && !empty($_POST['motdepasse'])) {
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
    }
}
