<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">


    <title>Tweety | Inscription</title>
    

   
</head>

<header>
<p>Bienvenue sur Tweety</p>



       

    
    </header>
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



        <body>
        <div class= connexion>
            <!-- zone de connexion -->
            <form id="formulaire-tweet" action="" method="post">
        
                <h2>CONNEXION</h2>
                
              
                <input type="text" placeholder="Nom utilisateur" name="username" required>

                
                <input type="password" placeholder="Mot de passe" name="password" required>

                <input class="action" type="submit" name="action-follow" value="Connexion"/>
                
            </form>
        </div>


        <div class= inscription>
        <form id="formulaire-tweet" action="" method="post">
                <h3>INSCRIPTION</h3>

                
                <input type="text" placeholder="Nom utilisateur" name="username" required>

               
                <input type="password" placeholder="Mot de passe" name="password" required>

              
                <input type="password" placeholder="Mot de passe" name="password" required>

                <input class="action" type="submit" name="action-follow" value="Inscription"/>
                </form>
        </div>


        
    </body>


    <footer>
        <p>Tweety | 2021</p>
    </footer>

</html>
