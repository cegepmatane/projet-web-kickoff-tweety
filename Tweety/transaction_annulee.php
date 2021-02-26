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
    <title>Tweety | Dommage !</title>
    <link rel="stylesheet" href="decoration/a-propos.css">
</head>
<body>
<header></header>
<!-- Menu -->
<?php include('menu.php'); ?>

<?php
//Redirige l'utilisateur vers la page d'authentification s'il n'est pas connecté
if (!est_connecte()) {
    header('Location: index.php');
}
?>


<section>
    <div>
        <h2>MERCI !</h2>
        <br>
        <p>
            Merci quand même d'avoir pensé à nous !
        </p>
        <a class="button action" id="checkout-button" href="accueil.php">Retour à l'accueil</a>
    </div>
</section>
</body>
