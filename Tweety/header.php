<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device, initial-scale=1.0">
        <title>Tweety | Accueil</title>

        <link rel="stylesheet" href="decoration/style.css">
    </head>
    <body>
        <!-- En-tête -->
        <header></header>
        <!-- Connexion -->
        <?php if(!isset($_COOKIE["user"])) {
        header("Location: connexion.php");
        } ?>
        <!-- Menu -->
        <?php include('menu.php'); ?>

