<?php
session_start();
$_SESSION['type'] = $_SESSION['type'];
$_SESSION['email']= $_SESSION['email'];
$_SESSION['timeout_idle'] = time() + 2*24*60;
?>
<html lang="fr">

    <head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="Aurélien PUJOL Antoine Picot">
      <link rel="icon" type="image/ico" href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/H%26M-Logo.svg/1200px-H%26M-Logo.svg.png" />
      <title>H&M</title>

      <!-- Bootstrap core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">

      <!-- Custom styles for this template -->


    </head>
<body>
    
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="http://localhost/EcommercePhp/Acceuil/index.html">Hennes & Mauritz</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/EcommercePhp/Client/index.php">Acceuil</a>
          </li>
            <a class="nav-link" href="http://localhost/EcommercePhp/Client/GestionCommande.php">Commande</a>
          </li>
            <a class="nav-link" href="http://localhost/EcommercePhp/Client/ProfilUtilisateur.php">Profil</a>
        </ul>
      </div>
    </div>
  </nav>

    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                <div class="container">
                  <a class="navbar-brand" href="http://localhost/EcommercePhp/Acceuil/index.html">Hennes & Mauritz</a>
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
                    </ul>
                  </div>
                </div>
              </nav>

        <!-- Header - set the background image for the header in the line below -->
        <header class="py-5 bg-image-full" style="background-image: url('http://www.dayblog.fr/wp-content/uploads/2016/09/Toplook.com-une-boutique-en-ligne-specialisee-dans-la-vente-en-gros-de-vetements-et-de-chaussures.jpg');">
          <img class="img-fluid d-block mx-auto" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/H%26M-Logo.svg/1200px-H%26M-Logo.svg.png" alt="">
        </header>

        <!-- Content section -->
        <section class="py-5">
          <div class="container">
            <h1>Présentation</h1>
            <p></p>
            <p> Hennes et Mauritz, plus connu sous le nom de H&M, est une entreprise et chaîne de magasins suédoise de prêt-à-porter pour femme, enfant et homme, fondée en 1947 par Erling Persson.
                  H&M est présent dans 69 pays et emploie environ 171 000 personnes et possède plus de 4 700 magasins.
                  L'enseigne propose notamment des collections temporaires créées en collaboration avec des stylistes (Karl Lagerfeld, Viktor & Rolf, Roberto Cavalli, Versace, Balmain, Kenzo) ou des stars (Madonna, Nicki Minaj, Kylie Minogue, Katy Perry, Lana Del Rey, David Beckham, Vanessa Paradis, Beyoncé, Lady Gaga, Rihanna, Caitlyn Jenner, The Weeknd, Ariana Grande).
                  Aux côtés de Calvin Klein (CK.com) et American Eagle (AE.com), H&M fait partie de la VB.com Internet Hall of Fame en possédant un nom de domaine à seulement deux lettres4. Le groupe a pu obtenir le domaine HM.com en 19985. Il vend aussi des meubles et des articles de décoration.  </p>
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
