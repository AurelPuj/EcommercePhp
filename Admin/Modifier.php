<?php
    session_start();
    if(!isset($_SESSION['type']) || $_SESSION['type'] != 'Manager'){
        header('Location: http://localhost/EcommercePhp/Client/index.php');
    }
    
    // Vérification de la duree de la session
    if (!isset($_SESSION['timeout_idle'])) {
        $_SESSION['timeout_idle'] = time() + 2*24*60;
    } 
    else {
        if ($_SESSION['timeout_idle'] < time()) {
        } 
        else {
            $_SESSION['timeout_idle'] = time() + 2*24*60;
        }
    }
 ?>
<html>
    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/Ajouter.css" rel="stylesheet">
        
        <link rel="icon" type="image/ico" href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/H%26M-Logo.svg/1200px-H%26M-Logo.svg.png" />
        <title>H&M</title>
        
    </head>
    <body>
        <a href="../../../../../../wamp64/www/Ecommerce/Admin/Ajouter.php"></a>
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
                  <a class="nav-link" href="http://localhost/EcommercePhp/Acceuil/index.html">Acceuil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="http://localhost/EcommercePhp/Connexion/Log.php">Connexion</a>

                </li>
                <li class="nav-item">
                  <a class="nav-link" href="http://localhost/EcommercePhp/Admin/index.php">Admin</a>

                </li>
              </ul>
            </div>
          </div>
        </nav>
     
        <section class="py-5"> 
                <!-- Page Content -->
                <div class="container">

                  <!-- Portfolio Item Heading -->
                  <h1 class="my-4">
                        <input id="Référence" class="form-control" placeholder="Référence produit du produit" required autofocus>
                  </h1>
                  <button class="btn btn-lg btn-primary btn-block" type="submit">rechercher</button>
                </div>
        </section>
         <?php
            
                // Connexion à la base de données
                try
                {
                        $bdd = new PDO('mysql:host=localhost;dbname=ecommerce;charset=utf8', 'root', '');
                }
                catch(Exception $e)
                {
                        die('Erreur : '.$e->getMessage());
                }

         ?>
        <footer class="py-5 bg-dark">
            <div class="container">
              <p class="m-0 text-center text-white">Téléphone : 01.68.85.20.03          Adresse : 6 rue de la mode, Paris</p>
            </div>
            <!-- /.container -->
          </footer>
    </body>
</html>
<!DOCTYPE html>
