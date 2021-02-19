<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device, initial-scale=1.0">
    <link rel="stylesheet" href="decoration/pageprofil.css">
    <title>Tweety | Profil</title>


</head>
<body>
<!-- En-tête -->
<?php require_once('header.php'); ?>


<?php
require_once ('./accesseur/TweetDAO.php');

$tweetDAO = new TweetDAO();
$tweets = $tweetDAO->listerTweetsCompte();

require_once ('./accesseur/UtilisateurDAO.php');
$utilisateur = new UtilisateurDAO();
//$utilisateur = $utilisateur->obtenirUtilisateur();
$pseudonyme = $utilisateur->obtenirPseudonyme();
$biographie = $utilisateur->obtenirBiographie();

require_once('./action/gere-profil.php');
?>
<h1><?=$pseudonyme?></h1>
<form method="post">
    <h2>Modifier Pseudonyme : <input type="text" name="pseudonyme" placeholder=<?=$pseudonyme?>></h2>

    <h2>Description : <input type="text" name="biographie" id="formeDescription" placeholder=<?=$biographie?>></h2>
    <?=var_dump($biographie)?>
    <input class="action" type="submit" name="action-modifier" value="Modifier Profil"</a>

</form>
<section>
    <!-- Affichage tweets -->
    <div id="tweets">
        <?php foreach ($tweets as $tweet): ?>
            <div class="tweet">
                <div><p id="pseudonyme"><?=$pseudonyme?></p></div>
                <div><p id="post"><?=$tweet->post?></p></div>
                <div><p id="date"><?=$tweet->date?></p></div>
                <table class=bouton-admin>
                    <div>

                        <tr><form action="" method="post">
                                <input type="hidden" name="tid" value="<?=$tweet->tid?>"/>
                                <div>
                                    <input class="action" type="submit" name="action-modifier" value="Modifier"/>
                                </div>
                            </form></tr>
                    </div>
                    <div>
                        <tr><form action="" method="post">
                                <input type="hidden" name="tid" value="<?=$tweet->tid?>"/>
                                <div>
                                    <input class="action" type="submit" name="action-supprimer" value="Supprimer"/>
                                </div>
                            </form></tr>
                    </div>
                </table>
            </div>
        <?php endforeach; ?>
    </div>

</section>
