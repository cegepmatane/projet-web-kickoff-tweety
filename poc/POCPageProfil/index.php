<!-- En-tête -->
<?php require_once('vues/header.php'); ?>

<?php
require_once ('./accesseur/TweetDAO.php');
$tweetDAO = new TweetDAO();
$tweets = $tweetDAO->listerTweetsCompte();

require_once ('./accesseur/UtilisateurDAO.php');
$utilisateur = new UtilisateurDAO();
$pseudonyme = $utilisateur->obtenirPseudonyme();
$biographie = $utilisateur->obtenirBiographie();

?>

<!-- Affichage tweets -->
<table class="mt-5 table-auto">
    <tr>
       <td><?=$pseudonyme?></td>
    </tr>
    <tr>
       <td><?=$biographie?></td>
    </tr>
</table>

<table class="mt-5 table-auto">
    <tr>
        <td>Vos Tweets</td>
    </tr>
</table>
<table class="mt-5 table-auto">
<tr>
    <td>Auteur</td>
    <td>Tweet</td>
    <td>Date</td>
    <td>Follow ?</td>
    <?php foreach ($tweets as $tweet): ?>
        <tr>
            <td><?=$utilisateur->obtenirPseudonyme($tweet->uid)?></td>
            <td><?=$tweet->post?></td>
            <td><?=$tweet->date?></td>
            <td><?=$tweetDAO->estUnFollower($tweet->uid, $utilisateur->obtenirUtilisateur()) ? "Unfollow" : "Follow"?></td>
        </tr>
    <?php endforeach; ?>
</table>

<!--  Pied de page -->
<?php require_once('vues/footer.php');
