<?php
session_start();
$_SESSION['type'] = $_SESSION['type'];
$_SESSION['email']= $_SESSION['email'];
$_SESSION['timeout_idle'] = time() + 2*24*60;
?>
<html>
    <head>
          <link rel="icon" type="image/ico" href="https://img.generation-nt.com/logo-materiel-net_040003C501642167.png" />
        <title>Connexion</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/Login.css" rel="stylesheet">
    </head>
    <body>
         <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
          <div class="container">
            <a class="navbar-brand" href="http://localhost/EcommercePhp/Acceuil/index.html">Materiel.net</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
                  <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                        <a class="nav-link" href="http://localhost/EcommercePhp/Client/index.php">Acceuil</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="http://localhost/EcommercePhp/Client/GestionCommande.php">Rechercher</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="http://localhost/EcommercePhp/Client/Commande.php">Pannier</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="http://localhost/EcommercePhp/Client/UserComs.php">Commentaire</a>
                        </li>
                        
                        <li class="nav-item">
                          <a class="nav-link" href="http://localhost/EcommercePhp/Client/ProfilUtilisateur.php">Profil</a>
                        </li>
                    </ul>
                  </div>
                </div>
              </nav>

        <!-- Header - set the background image for the header in the line below -->
            <header class="py-5 bg-image-full" style="background-image: url('https://blog.materiel.net/wp-content/uploads/2017/09/illustr_qui_sommes_nous_2017.jpg');">
              <img class="img-fluid d-block mx-auto" src="https://blog.materiel.net/wp-content/uploads/2017/09/illustr_qui_sommes_nous_2017.jpg" alt="">
            </header>

            <!-- Content section -->
            <section class="py-5">
              <div class="container">
                <h1>Présentation</h1>
                <p></p>
                <p> Le Groupe LDLC est un groupe français de commerce en ligne, créé en 1996 par Laurent de la Clergerie. Il est classé 5e en France par la FEVAD en 2016. Son enseigne majeure, LDLC.com, se positionne comme acteur majeur du commerce en ligne informatique et high-tech en France. Constitué de multiples marques dont cinq sites marchands, ce regroupement d’entreprises conjugue des activités dans le domaine de l’informatique, du high-tech ou encore de l’éducation.
                      Outre les caractéristiques communes à la plupart des sites de vente en ligne (top des ventes par catégorie, appréciations en ligne des produits, etc.), le site a rapidement mis en place une recherche à facettes pour faciliter la recherche de produit comme les cartes mères, les RAM ou les moniteurs dont l'offre se chiffre parfois en centaines de modèles. Le site a de plus la particularité de proposer des ordinateurs livrés sans système d'exploitation pré-installé.
                      La société est cotée en bourse sur Euronext Growth3 (code LDL). </p>

              </div>
            </section>

        <footer class="py-5 bg-dark">
          <div class="container">
            <p class="m-0 text-center text-white">Téléphone : 01.68.85.20.03          Adresse : 6 rue de la mode, Paris</p>
          </div>
          <!-- /.container -->
        </footer>
    </body>

</html>
