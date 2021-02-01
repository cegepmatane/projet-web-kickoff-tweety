<!-- En-tête -->
<?php require_once('header.php'); ?>

<?php
require_once ('../accesseur/TweetDAO.php');

$tweetDAO = new TweetDAO();

$tweets = $tweetDAO->listerTweets();
?>

<!-- Affichage tweets -->
<table class="mt-5 table-auto">
    <?php foreach ($tweets as $tweet): ?>
        <tr>
            <td><?=$tweet->uid?></td>
            <td><?=$tweet->post?></td>
            <td><?=$tweet->date?></td>
            <td><a href="">Modifier</a></td>
            <td><a href="">Supprimer</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<!--  Pied de page -->
<?php require_once('footer.php');
