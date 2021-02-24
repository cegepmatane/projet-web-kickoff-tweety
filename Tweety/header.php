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

    <link rel="stylesheet" href="decoration/accueil.css">
</head>
<body>
<header></header>
<!-- Menu -->
<?php include('menu.php'); ?>

<?php
// Redirige l'utilisateur vers la page d'authentification s'il n'est pas connecté
if (!est_connecte()) {
    header('Location: index.php');
}
?>
