<!-- En-tête -->
<?php require_once ('header.php'); ?>

<?php
require_once ('accesseur/UtilisateurDAO.php');

require_once ('action/gerer-connexion.php'); ?>

<section>
    <form method="post">
        <input type="text" name="nomutilisateur" placeholder="Nom d'utilisateur">
        <input type="password" name="motdepasse" placeholder="Mot de passe">
        <input class="action" type="submit" name="action-connecter" value="Connexion">
    </form>
</section>

<!--  Pied de page -->
<?php require_once('footer.php');
