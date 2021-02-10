<!-- En-tête -->
<?php require_once ('header.php'); ?>

<?php
require_once ('accesseur/TweetDAO.php');
require_once ('accesseur/UtilisateurDAO.php');

require_once ('action/gerer-administration.php');

$tweetDAO = new TweetDAO();

$tweets = TweetDAO::listerTweets();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="decoration/styles2.css">
</head>

<section>
    <div id="tweets">
        <!-- Affichage tweets -->
        <table>
            
            <?php foreach ($tweets as $tweet): ?>
                <div class="tweet">
                    <td><a href=" " title="<?= UtilisateurDAO::obtenirBiographie($tweet->uid)?>"><?=UtilisateurDAO::obtenirPseudonyme($tweet->uid)?></a></td>
                    <td><?=$tweet->post?></td>
                    <td><?=$tweet->date?></td>
                    <td><a class="action" href="modifier.php?tid=<?=$tweet->tid?>">Modifier</a></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="tid" value="<?=$tweet->tid?>"/>
                            <div>
                                <input type="submit" class="action" name="action-supprimer" value="Supprimer"/>
                            </div>
                        </form>
                    </td>
                </div>            
            <?php endforeach; ?>
            
        </table>
    </div>
</section>
<!--  Pied de page -->
<?php require_once('footer.php');
