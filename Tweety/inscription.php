<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device, initial-scale=1.0">


    <title>Tweety | Inscription</title>



</head>

<?php
require_once ('accesseur/InscriptionDAO.php');
require_once ('action/gerer-inscription.php');

?>
<form action="" method="post">
    <label><b>Inserer le pseudonyme désiré :</b></label>
    <input name="pseudonyme" type="text" placeholder="Pseudonyme">
    <label><b>Inserer la biographie désirée :</b></label>
    <input name="biographie" type="textarea" placeholder="Biographie">
    <input type="submit" name="action-inscription" value="Valider l'inscription">
</form>

<?php
