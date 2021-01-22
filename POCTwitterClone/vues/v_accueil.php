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
        </tr>
    <?php endforeach; ?>
</table>

<!--  Pied de page -->
<?php require_once('vues/v_footer.php');
