<!-- En-tête -->
<?php require_once('header.php'); ?>

<form action="">
    <textarea name="tweet" class="border-solid border-2"><?=$tweet->post?></textarea>
    <input type="submit" value="Modifier">
</form>

<!--  Pied de page -->
<?php require_once('footer.php');