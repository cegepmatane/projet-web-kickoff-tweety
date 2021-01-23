<!-- En-tête -->
<?php require_once('vues/v_header.php'); ?>

<form action=/index.php>
    <textarea name="tweet" class="border-solid border-2"></textarea>
    <input type="submit" value="Tweet">
</form>

<!-- Affichage tweets -->
<table class="mt-5 table-auto border-2">
    <?php foreach ($tweets as $tweet): ?>
        <tr class="border-2">
            <td class="border-2"><?=$tweet->getUid()?></td>
            <td class="border-2"><?=$tweet->getPost()?></td>
            <td class="border-2"><?=$tweet->getDate()?></td>
            <?php if (!$tweet->getSuivi()) { ?>
                <td><a href="index.php?follow=<?=$tweet->getUid()?>" class="text-indigo-500
                hover:text-indigo-600 underline">Follow</a></td>
            <?php } else { ?>
                <td><a href="index.php?unfollow=<?=$tweet->getUid()?>" class="text-indigo-500
                hover:text-indigo-600 underline">Unfollow</a></td>
            <?php } ?>
        </tr>
    <?php endforeach; ?>
</table>

<?php if ($tweetsSuivis) { ?>
    <!-- Affichage tweets suivis -->
    <h2 class="mt-5">Tweets des utilisateurs suivis</h2>
    <table class="table-auto border-2">
        <?php foreach ($tweetsSuivis as $tweet): ?>
            <tr class="border-2">
                <td class="border-2"><?=$tweet->getUid()?></td>
                <td class="border-2"><?=$tweet->getPost()?></td>
                <td class="border-2"><?=$tweet->getDate()?></td>
                <?php if (!$tweet->getSuivi()) { ?>
                    <td><a href="index.php?follow=<?=$tweet->getUid()?>" class="text-indigo-500
                hover:text-indigo-600 underline">Follow</a></td>
                <?php } else { ?>
                    <td><a href="index.php?unfollow=<?=$tweet->getUid()?>" class="text-indigo-500
                hover:text-indigo-600 underline">Unfollow</a></td>
                <?php } ?>
            </tr>
        <?php endforeach; ?>
    </table>
<?php } ?>

<!--  Pied de page -->
<?php require_once('vues/v_footer.php');
