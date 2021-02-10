<!-- En-tête -->
<?php require_once('header.php'); ?>

<?php
require_once ('accesseur/TweetDAO.php');

$tweet = TweetDAO::detaillerTweet($_GET['tid']);
?>

<form action="administration.php" method="post">
    <input type="hidden" name="tid" value="<?=$tweet->tid?>"/>
    <textarea name="tweet" class="border-solid border-2"><?=$tweet->post?></textarea>
    <input type="submit" name="action-modifier" value="Modifier"/>
</form>

<!--  Pied de page -->
<?php require_once('footer.php');