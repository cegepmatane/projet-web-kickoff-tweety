<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Tweety | Accueil</title>

    
</head>

<?php

    require_once ('Tweet.php');

    $tweets = array();
    for ($i=0;$i<3;$i++) {
        for ($j=0;$j<2;$j++) {
            $tweets[] = new Tweet(array(
                'tid' => $i+$j,
                'uid' => $i,
                'post' => "Sed pellentesque lectus laoreet justo maximus, ut semper nibh interdum. Donec blandit imperdiet euismod. Nullam egestas dignissim venenatis.",
                'date' => Date("Y-m-d H:i:s"),
                'suivi' => mt_rand(0,1),
            ));
        }
    }

?>

<body>
    <!-- En-tête -->
    <header></header>

    <!-- Menu -->
        <nav>
            <ul id="menu">
                <li><a class="action">Tweety</a></li>
                <li><a class="menu-item" href="">Accueil</a></li>
                <li><a class="menu-item" href="">Suivis</a></li>
                <li><a class="menu-item" href="">Profil</a></li>
                <li><a class="menu-item" href="">Administration</a></li>
                <li><a class="action" href="">Déconnexion</a></li>
            </ul>
        </nav>

    <!-- Page Administration -->

    <section>
        <!-- Affichage tweets -->
        <div id="tweets">
            <?php foreach ($tweets as $tweet): ?>
            <div class="tweet">
                <div><?=$tweet->post?></div>
                <div><?=$tweet->date?></div>
                <table class=bouton-admin>
                <div>
                    
                    <tr><form action="" method="post">
                        <input type="hidden" name="tid" value="<?=$tweet->tid?>"/>
                        <div>
                            <input class="action" type="submit" name="action-modifier" value="Modifier"/>
                        </div>
                    </form></tr>
                </div>
                <div>
                    <tr><form action="" method="post">
                        <input type="hidden" name="tid" value="<?=$tweet->tid?>"/>
                        <div>
                            <input class="action" type="submit" name="action-supprimer" value="Supprimer"/>
                        </div>
                        </form></tr>
                </div>
                </table>
            </div>
            <?php endforeach; ?>
        </div>

    </section>

    <footer>
        <p>Tweety | 2021</p>
    </footer>
</body>
</html>