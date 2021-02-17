<?php
require_once('accesseur/UtilisateurDAO.php');
require_once ('util.php');

initialiser_session();
require_once('action/gerer-authentification.php');
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device, initial-scale=1.0">
        <title>Tweety | Accueil</title>

        <link rel="stylesheet" href="decoration/authentification.css">
    </head>
    <body>
        <!-- En-tête -->
        <header></header>
        <!-- Menu -->
        <?php include('menu.php'); ?>
