<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device, initial-scale=1.0">
    <link rel="stylesheet" href="">

    <title>Tweety | Connexion</title>
</head>
<?php
require_once ('accesseur/ConnexionDAO.php');
require_once ('action/gerer-connexion.php');

$listeMembres = ConnexionDAO::obtenirToutLesMembres();
?>

<label>Inserer l'UID désiré :</label>
<form action="" method="post">
    <input name="uid" type="text" placeholder="UID désiré">
    <input type="submit" name="action-connexion" value="Valider UID">
</form>


<h2>Liste des utilisateurs</h2>
<table>
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
