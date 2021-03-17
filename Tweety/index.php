<!-- En-tête -->
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
    <title>Tweety</title>

    <link rel="stylesheet" href="decoration/authentification.css">
</head>
<body>
<header></header>
<!-- Menu -->
<?php include('menu.php'); ?>

<?php
// Redirige l'utilisateur vers la page d'accueil s'il est déjà connecté
if (est_connecte()) {
    header('Location: accueil.php');
}
?>

<!-- Page -->
<div id="conteneur">
    <section>
        <h2>Connexion</h2>
        <form method="post">
            <input type="text" name="nomutilisateur" placeholder="Nom d'utilisateur">
            <input type="password" name="motdepasse" placeholder="Mot de passe">
            <input class="action" type="submit" name="action-connecter" value="Connexion">
        </form>
    </section>

    <hr>

    <section>
        <h2>Inscription</h2>
        <form method="post">
            <input type="text" name="nomutilisateur" placeholder="Nom utilisateur">
            <div id="messageMail"></div>
            <input type="email" name="email" id="email" placeholder="Email">
            <input type="password" name="motdepasse" placeholder="Mot de passe">
            <input type="password" name="confirmation-motdepasse" placeholder="Confirmation du mot de passe">
            <input class="action" type="submit" name="action-inscrire" value="Inscription">
        </form>
    </section>
</div>

<script src="scripts/s_verifier-email.js"></script>
<script src="scripts/s_verifier-email-base-de-donne.js"></script>


<!--  Pied de page -->
<?php require_once('footer.php');
