<!-- En-tête -->
<?php require_once ('header.php'); ?>

<?php
require_once ('accesseur/UtilisateurDAO.php');
require_once ('accesseur/TweetDAO.php');

require_once('action/gerer-accueil.php');
$tweets = TweetDAO::listerTweets();
$tweetsSuivis = TweetDAO::listerTweetsSuivis();
?>

<!-- Tweeter -->
<form action="" method="post">
    <textarea name="tweet" class="border-solid border-2"></textarea>
    <input type="submit" name="action-tweeter" value="Tweet">
</form>

<!-- Affichage tweets -->
<h2 class="mt-5 mb-1 text-2xl">Feed de Tweety</h2>
<table class="table-auto">
    <?php foreach ($tweets as $tweet): ?>
        <tr>
            <td><a href=" " title="<?= UtilisateurDAO::obtenirBiographie($tweet->uid)?>" style="background-color:#FFFFFF;color:#000000;text-decoration:none;cursor:help;"><?=UtilisateurDAO::obtenirPseudonyme($tweet->uid)?></a></td>
            <td><?=$tweet->post?></td>
            <td><?=$tweet->date?></td>
            <?php if(TweetDAO::estUnFollower(TweetDAO::obtenirUtilisateur(),$tweet->uid)) { ?>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="uid" value="<?=$tweet->uid?>"/>
                        <div>
                            <input type="submit" name="action-unfollow" value="Unfollow"/>
                        </div>
                    </form>
                </td>
            <?php } else { ?>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="uid" value="<?=$tweet->uid?>"/>
                        <div>
                            <input type="submit" name="action-follow" value="Follow"/>
                        </div>
                    </form>
                </td>
            <?php } ?>
        </tr>
    <?php endforeach; ?>
</table>

<?php if ($tweetsSuivis) { ?>
    <!-- Affichage tweets suivis -->
    <h2 class="mt-5 mb-1 text-2xl">Tweets des utilisateurs suivis</h2>
    <table class="table-auto">
        <?php foreach ($tweetsSuivis as $tweet): ?>
            <tr>
                <td><a href=" " title="<?= UtilisateurDAO::obtenirBiographie($tweet->uid)?>" style="background-color:#FFFFFF;color:#000000;text-decoration:none;cursor:help;"><?=UtilisateurDAO::obtenirPseudonyme($tweet->uid)?></a></td>
                <td><?=$tweet->post?></td>
                <td><?=$tweet->date?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="uid" value="<?=$tweet->uid?>"/>
                        <div>
                            <input type="submit" name="action-unfollow" value="Unfollow"/>
                        </div>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php } ?>

<!--  Pied de page -->
<?php require_once('footer.php');