<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device, initial-scale=1.0">
    <title>Tweety | Administration</title>

    <link rel="stylesheet" href="decoration/administration.css">
</head>
<body>
<!-- En-tête -->
<header></header>
<!-- Connexion -->
<?php if(!isset($_COOKIE["user"])) {
    header("Location: a_connexion.php");
} ?>
<!-- Menu -->
<?php include('menu.php'); ?>

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
                    <td><a href=" " title="<?= UtilisateurDAO::obtenirBiographie($tweet->uid)?>"><?=UtilisateurDAO::obtenirPseudonyme($tweet->uid)?></a></td>
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
