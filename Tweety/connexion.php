<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device, initial-scale=1.0">
    <link rel="stylesheet" href="public/styles.css">


    <title>Tweety | Connexion</title>



</head>
<?php
require_once ('accesseur/ConnexionDAO.php');
require_once ('action/gerer-connexion.php');

$listeMembres = ConnexionDAO::obtenirToutLesMembres();
?>

<label><b>Inserer l'UID désiré :</b></label>
<form action="" method="post">
    <input name="uid" type="text" placeholder="UID désiré">
    <input type="submit" name="action-connexion" value="Valider UID">
</form>


<h2 class="mt-5 mb-1 text-2xl">Liste des utilisateurs</h2>
<table class="table-auto">
    <tr>
        <td><b>UID</b></td>
        <td><b>Pseudonyme</b></td>
    </tr>
    <?php foreach ($listeMembres as $membre): ?>
        <tr>
            <td><?=$membre["uid"]?></td>
            <td><?=$membre["pseudonyme"]?></td>
        </tr>
    <?php endforeach; ?>
</table>
