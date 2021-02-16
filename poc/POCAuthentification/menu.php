        <nav>
            <ul id="menu">
                <li><a>Tweety</a></li>
                <?php if (est_connecte()): ?>
                    <li><a class="menu-item" href="accueil.php">Accueil</a></li>
                    <li><a class="menu-item" href="suivis.php">Suivis</a></li>
                    <li><a class="menu-item" href="profil.php">Profil</a></li>
                    <?php if (est_admin()): ?>
                        <li><a class="menu-item" href="administration.php">Administration</a></li>
                    <?php endif; ?>
                    <li><a class="menu-item" href="a-propos.php">A propos</a></li>
                    <li><form action="index.php" method="post">
                            <input class="action" type="submit" name="action-deconnecter" value="Deconnexion">
                        </form>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>