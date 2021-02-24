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
        <title>Tweety | Administration</title>

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


<?php
require_once ('accesseur/TweetDAO.php');
require_once ('accesseur/UtilisateurDAO.php');

require_once ('action/gerer-administration.php');

$tweetDAO = new TweetDAO();

$tweets = TweetDAO::listerTweets();
?>

<section>
    <div id="tweets">
        <!-- Affichage tweets -->
        <?php foreach ($tweets as $tweet): ?>
            <div class="tweet">
                <div>
                    <td><?=$tweet->nomutilisateur?></td>
                </div>
                <div>
                    <td><?=$tweet->post?></td>
                </div>
                <div>
                    <td><?=$tweet->date?></td>
                </div>
                <div>
                    <td><a class="action bouton1" href="modifier.php?tid=<?=$tweet->tid?>">Modifier</a></td>
                </div>
                <div>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="tid" value="<?=$tweet->tid?>"/>
                            <div>
                                <input type="submit" class="action bouton1" name="action-supprimer" value="Supprimer"/>
                            </div>
                        </form>
                    </td>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<!--  Pied de page -->
<?php require_once('footer.php');
