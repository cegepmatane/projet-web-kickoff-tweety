<?php

$utilisateur = UtilisateurDAO::obtenirUtilisateur($_POST['nomutilisateur']);

var_dump($utilisateur);
