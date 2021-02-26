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
    <title>Tweety | Mission</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
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
            <h2>Notre mission</h2>
            <br>
            <p>
            Le but de ce site Web est de faire un état des lieux de nos capacités à développer dans un environnement Web et en équipe.<br><br>

            Ce site devra contenir :
            <br>
            <br>
            Une page d'accueil
            <br>
            Une page décrivant la mission
            <br>
            Une à deux pages contenant la liste et le détail des données principales
            <br>
            Une page d'administration permettant d'ajouter, de modifier et de supprimer des données
            <br>
            Un menu pour la navigation entre les pages
            <br>

            Ce site devra permettre :
            <br>
            <br>
            L'inscription de membres
            <br>
            L'authentification de membres
            <br>
            L'auto-édition de leur profil
            <br>
            La transaction de paiement en ligne
            <br>
            L'affichage d'historiques de leur transactions
            <br>
            L'interactivité Ajax
            <br>
            La traduction des pages en français et en anglais
            </p>
        </div>
    </section>

    <section>
        <a class="button action" id="checkout-button">Checkout</a>
    </section>
    <script src="scripts/transaction.js"></script>
</body>
