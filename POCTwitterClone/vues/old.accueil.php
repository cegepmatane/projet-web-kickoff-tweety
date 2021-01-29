<!-- En-tête -->
<?php require_once('vues/header.php'); ?>

<form action=/old.index.php>
    <textarea name="tweet" class="border-solid border-2"></textarea>
    <input type="submit" value="Tweet">
</form>

<!-- Affichage tweets -->
<table class="mt-5 table-auto">
    <?php foreach ($tweets as $tweet): ?>
        <tr>
            <td><?=$tweet->getUid()?></td>
            <td><?=$tweet->getPost()?></td>
            <td><?=$tweet->getDate()?></td>
            <?php if (!$tweet->getSuivi()) { ?>
                <td><a href="../old.index.php?follow=<?=$tweet->getUid()?>">Follow</a></td>
            <?php } else { ?>
                <td><a href="../old.index.php?unfollow=<?=$tweet->getUid()?>">Unfollow</a></td>
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
                <td><?=$tweet->getUid()?></td>
                <td><?=$tweet->getPost()?></td>
                <td><?=$tweet->getDate()?></td>
                <?php if (!$tweet->getSuivi()) { ?>
                    <td><a href="../old.index.php?follow=<?=$tweet->getUid()?>">Follow</a></td>
                <?php } else { ?>
                    <td><a href="../old.index.php?unfollow=<?=$tweet->getUid()?>">Unfollow</a></td>
                <?php } ?>
            </tr>
        <?php endforeach; ?>
    </table>
<?php } ?>

<!--  Pied de page -->
<?php require_once('vues/footer.php');
