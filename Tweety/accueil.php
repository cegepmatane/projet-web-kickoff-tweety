<!-- En-tête -->
<?php require_once('header.php'); ?>

<?php
require_once ('accesseur/UtilisateurDAO.php');
require_once ('accesseur/TweetDAO.php');

require_once('action/gerer-accueil.php');
$tweets = TweetDAO::listerTweets();
$tweetsSuivis = TweetDAO::listerTweetsSuivis();
?>

<!-- Points lumineux animés -->
<div id="conteneur-points">
    <div class="luisant">
        <span style="--i:1;"></span>
        <span style="--i:2;"></span>
        <span style="--i:3;"></span>
    </div>
    <div class="luisant">
        <span style="--i:1;"></span>
        <span style="--i:2;"></span>
        <span style="--i:3;"></span>
    </div>
    <div class="luisant">
        <span style="--i:1;"></span>
        <span style="--i:2;"></span>
        <span style="--i:3;"></span>
    </div>
    <div class="luisant">
        <span style="--i:1;"></span>
        <span style="--i:2;"></span>
        <span style="--i:3;"></span>
    </div>
</div>

<!-- Tweeter -->
<section id="section-formulaire">
    <form id="formulaire-tweet" action="" method="post">
        <textarea name="tweet" placeholder="Quoi de neuf ?"></textarea>
        <input class="action" type="submit" name="action-tweeter" value="Tweet">
    </form>
</section>

<section id="section-tweets">
    <!-- Affichage tweets -->
    <div id="tweets">
        <?php foreach ($tweets as $tweet):
        ?>
            <div class="tweet">
                <div class="div-nomutilisateur" id="<?=$tweet->nomutilisateur?>">
                    <td><?=$tweet->nomutilisateur?></td>
                </div>
                <?php if(TweetDAO::estUnFollower($_SESSION['utilisateur']->uid, $tweet->uid)) { ?>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="uid" value="<?=$tweet->uid?>"/>
                            <div>
                                <input class="action follow" type="submit" name="action-unfollow" value="Unfollow"/>
                            </div>
                        </form>
                    </td>
                <?php } else { ?>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="uid" value="<?=$tweet->uid?>"/>
                            <div>
                                <input class="action" type="submit" name="action-follow" value="Follow"/>
                            </div>
                        </form>
                    </td>
                <?php } ?>
                <div><?=$tweet->date?></div>
                <div><?=$tweet->post?></div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<script>
    (function () {
        let httpRequest;

        let elements = document.getElementsByClassName("div-nomutilisateur");
        for (let i=0; i<elements.length; i++) {
            elements[i].addEventListener('click', function(evenement) {
                effectuerRequete(evenement, 'obtenir-biographie.php', this.id);
            });
        }

        function effectuerRequete(evenement, url, nomutilisateur) {
            console.log("effectuerRequete()")
            evenement.preventDefault();

            httpRequest = new XMLHttpRequest();

            if (!httpRequest) {
                console.log('Impossible de créer une instance de XMLHTTP');
                return false;
            }
            httpRequest.onreadystatechange = afficherBiographie;
            httpRequest.open('POST', url);
            httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            httpRequest.send('nomutilisateur=' + encodeURIComponent(nomutilisateur));
        }

        function afficherBiographie() {
            console.log("afficherBiographie()");
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    let reponse = JSON.parse(httpRequest.responseText);
                    alert(reponse.biographie);
                } else {
                    console.log('Un problème est survenu avec la requête.');
                }
            }
        }
    })();
</script>


<!--  Pied de page -->
<?php require_once('footer.php');