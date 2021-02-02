<!-- En-tête -->
<?php require_once ('header.php'); ?>

<?php
require_once ('accesseur/TweetDAO.php');

require_once ('action/gerer-administration.php');

$tweetDAO = new TweetDAO();

$tweets = TweetDAO::listerTweets();
?>

<!-- Affichage tweets -->
<table class="mt-5 table-auto">
    <?php foreach ($tweets as $tweet): ?>
        <tr>
            <td><?=$tweet->uid?></td>
            <td><?=$tweet->post?></td>
            <td><?=$tweet->date?></td>
            <td><a href="modifier.php?tid=<?=$tweet->tid?>">Modifier</a></td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="tid" value="<?=$tweet->tid?>"/>
                    <div>
                        <input type="submit" name="action-supprimer" value="Supprimer"/>
                    </div>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<!--  Pied de page -->
<?php require_once('footer.php');
