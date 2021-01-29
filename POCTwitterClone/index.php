<!-- En-tête -->
<?php require_once('vues/header.php'); ?>

<?php
require_once ('./accesseur/TweetDAO.php');

$tweetDAO = new TweetDAO();

$tweets = $tweetDAO->listerTweets();
$tweetsSuivis = $tweetDAO->listerTweetsSuivis();
?>

<!-- Affichage tweets -->
<table class="mt-5 table-auto">
    <?php foreach ($tweets as $tweet): ?>
        <tr>
            <td><?=$tweet->uid?></td>
            <td><?=$tweet->post?></td>
            <td><?=$tweet->date?></td>
            <?php if (!$tweet->suivi) { ?>
                <td><a href="">Follow</a></td>
            <?php } else { ?>
                <td><a href="">Unfollow</a></td>
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
                    <td><a href="">Follow</a></td>
                <?php } else { ?>
                    <td><a href="">Unfollow</a></td>
                <?php } ?>
            </tr>
        <?php endforeach; ?>
    </table>
<?php } ?>

<!--  Pied de page -->
<?php require_once('vues/footer.php');
