<!-- En-tête -->
<?php require_once ('header.php');

// Redirige l'utilisateur vers la page d'accueil s'il est déjà connecté
if (est_connecte()) {
    header('Location: accueil.php');
}
?>

<div id="conteneur">
    <section>
        <h2>Connexion</h2>
        <form method="post">
            <input type="text" name="nomutilisateur" placeholder="Nom d'utilisateur">
            <input type="password" name="motdepasse" placeholder="Mot de passe">
            <input class="action" type="submit" name="action-connecter" value="Connexion">
        </form>
    </section>

    <hr>

    <section>
        <h2>Inscription</h2>
        <form method="post">
            <input type="text" name="nomutilisateur" placeholder="Nom utilisateur">
            <input type="password" name="motdepasse" placeholder="Mot de passe">
            <input type="password" name="confirmation-motdepasse" placeholder="Confirmation du mot de passe">
            <input class="action" type="submit" name="action-inscrire" value="Inscription">
        </form>
    </section>
</div>

<!--  Pied de page -->
<?php require_once('footer.php');
