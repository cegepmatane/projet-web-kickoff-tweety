<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device, initial-scale=1.0">
    <title>Tweety | Accueil</title>

    <link rel="stylesheet" type="text/css" href="styles.css">
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
                <li><a class="menu-item">Tweety</a></li>
                <li><a class="menu-item" href="">Accueil</a></li>
                <li><a class="menu-item" href="">Suivis</a></li>
                <li><a class="menu-item" href="">Profil</a></li>
                <li><a class="menu-item" href="">Administration</a></li>
                <li><a class="action" href="">Déconnexion</a></li>
            </ul>
        </nav>

    <!-- Page accueil -->
    <section>
        <!-- Tweeter -->
        <form id="formulaire-tweet" action="" method="post">
            <textarea name="tweet" placeholder="Quoi de neuf ?"></textarea>
            <input class="action" type="submit" name="action-tweeter" value="Tweet">
        </form>
    </section>

    <section>
        <!-- Affichage tweets -->
        <div id="tweets">
            <?php foreach ($tweets as $tweet): ?>
            <div class="tweet">
                <div><?=$tweet->post?></div>
                <div><?=$tweet->date?></div>
                <?php if (!$tweet->suivi) { ?>
                <div>
                    <form action="" method="post">
                        <input type="hidden" name="uid" value="<?=$tweet->uid?>"/>
                        <div>
                            <input class="action suivre" type="submit" name="action-follow" value="Follow"/>
                        </div>
                    </form>
                </div>
                <?php } else { ?>
                <div>
                    <form action="" method="post">
                        <input type="hidden" name="uid" value="<?=$tweet->uid?>"/>
                        <div>
                            <input class="action" type="submit" name="action-unfollow" value="Unfollow"/>
                        </div>
                    </form>
                </div>
                <?php } ?>
            </div>
            <?php endforeach; ?>
        </div>

    </section>

    <footer>
        <p>Tweety | 2021</p>
    </footer>
</body>
</html>
