<!-- En-tête -->
<?php require_once('vues/header.php'); ?>

<form action="">
    <textarea name="tweet" class="border-solid border-2"><?=$tweet->getPost()?></textarea>
    <input type="submit" value="Modifier">
</form>

<!--  Pied de page -->
<?php require_once('vues/footer.php');