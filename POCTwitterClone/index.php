<!-- En-tête -->
<?php require_once ('header.php'); ?>

<?php
require_once ('accesseur/UtilisateurDAO.php');
require_once ('accesseur/TweetDAO.php');

require_once ('action/gerer-follow.php');

$tweets = TweetDAO::listerTweets();
$tweetsSuivis = TweetDAO::listerTweetsSuivis();
?>

<!-- Affichage tweets -->
<table class="mt-5 table-auto">
    <?php foreach ($tweets as $tweet): ?>
        <tr>
            <td><?=$tweet->uid?></td>
            <td><?=$tweet->post?></td>
            <td><?=$tweet->date?></td>
            <?php if (!$tweet->suivi) { ?>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="uid" value="<?=$tweet->uid?>"/>
                        <div>
                            <input type="submit" name="action-follow" value="Follow"/>
                        </div>
                    </form>
                </td>
            <?php } else { ?>
                <td><a href="action/unfollow.php?uid=<?=$tweet->uid?>">Unfollow</a></td>
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
                <td><?=$tweet->uid?></td>
                <td><?=$tweet->post?></td>
                <?php if (!$tweet->suivi) { ?>
                    <td><a href="action/follow.php?uid=<?=$tweet->uid?>">Follow</a></td>
                <?php } else { ?>
                    <td><a href="action/unfollow.php?uid=<?=$tweet->uid?>">Unfollow</a></td>
                <?php } ?>
            </tr>
        <?php endforeach; ?>
    </table>
<?php } ?>

<!--  Pied de page -->
<?php require_once('footer.php');
