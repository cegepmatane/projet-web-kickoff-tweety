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
    <title>Tweety | Profil</title>

    <link rel="stylesheet" href="decoration/profil.css">
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


<?php

require_once ('./accesseur/TweetDAO.php');

$tweetDAO = new TweetDAO();

if (!apcu_exists('tweets_utilisateur')) {
    apcu_store('tweets_utilisateur', $tweetDAO->listerTweetsCompte());
}
$tweets = apcu_fetch('tweets_utilisateur');

require_once ('./accesseur/UtilisateurDAO.php');
$utilisateur = new UtilisateurDAO();

require_once('./action/gerer-profil.php');
?>
<h1><?=$_SESSION['utilisateur']->nomutilisateur?></h1>
<form method="post">
    <h2>Modifier le nom d'utilisateur : <input type="text" name="nomutilisateur" placeholder=<?=$_SESSION['utilisateur']->nomutilisateur?>></h2>

    <h2>Description : <input type="text" name="biographie" id="formeDescription" placeholder=<?=$_SESSION['utilisateur']->biographie?>></h2>
    <input class="action" type="submit" name="action-modifier" value="Modifier Profil"</a>

</form>
<section>
    <!-- Affichage tweets -->
    <div id="tweets">
        <?php foreach ($tweets as $tweet): ?>
            <div class="tweet">
                <div><p id="pseudonyme"><?=$_SESSION['utilisateur']->nomutilisateur?></p></div>
                <div><p id="post"><?=$tweet->post?></p></div>
                <div><p id="date"><?=$tweet->date?></p></div>
                </table>
            </div>
        <?php endforeach; ?>
    </div>

</section>

<!--  Pied de page -->
<?php require_once('footer.php');
