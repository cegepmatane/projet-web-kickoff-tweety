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
            <div class="biographie" id="biographie-<?=$tweet->nomutilisateur?>-<?=$tweet->tid?>"></div>
            <div class="tweet">
                <div class="nomutilisateur" id="nomutilisateur-<?=$tweet->nomutilisateur?>-<?=$tweet->tid?>">
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

        let elements = document.getElementsByClassName("nomutilisateur");
        for (let i=0; i<elements.length; i++) {
            elements[i].addEventListener('click', function(evenement) {
                effectuerRequete(evenement, 'obtenir-biographie.php', this.id);
            });
        }

        function effectuerRequete(evenement, url, id) {
            console.log("effectuerRequete()")
            evenement.preventDefault();

            // Extraire le nom d'utilisateur et l'id du tweet
            id = id.replace('nomutilisateur-', '');
            id = id.split('-');
            let nomutilisateur = id[0];
            let tid = id[1];

            // Ne plus afficher la biographie s'il est déjà affichée
            let div = document.getElementById('biographie-'+nomutilisateur+'-'+tid);
            let style = window.getComputedStyle(div).display
            if (style === 'block') {
                div.style.display = 'none';
                return;
            }

            httpRequest = new XMLHttpRequest();

            if (!httpRequest) {
                console.log('Impossible de créer une instance de XMLHTTP');
                return false;
            }
            // Envoyer la requête
            httpRequest.onreadystatechange = afficherBiographie;
            httpRequest.open('POST', url);
            httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            httpRequest.send('nomutilisateur=' + encodeURIComponent(nomutilisateur)+'&tid=' + encodeURIComponent(tid));
        }

        function afficherBiographie() {
            console.log("afficherBiographie()");
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    let reponse = JSON.parse(httpRequest.responseText);
                    let div = document.getElementById('biographie-'+reponse.nomutilisateur+'-'+reponse.tid);
                    div.innerHTML = reponse.biographie;
                    div.style.display = 'block';
                } else {
                    console.log('Un problème est survenu avec la requête.');
                }
            }
        }
    })();
</script>


<!--  Pied de page -->
<?php require_once('footer.php');