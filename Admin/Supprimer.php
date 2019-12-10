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
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
                  <a class="nav-link" href="http://localhost/EcommercePhp/Acceuil/index.html">Accueil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="http://localhost/EcommercePhp/Admin/Ajouter.php">Ajouter</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="http://localhost/EcommercePhp/Admin/Supprimer.php">Supprimer</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="http://localhost/EcommercePhp/Admin/Liste.php">Gestion</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="http://localhost/EcommercePhp/Admin/AdminComs.php">Commentaire</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
         
         <section class="py-5">
                <!-- Page Content -->
                <div class="container">

                  <!-- Page Heading -->
                  <h1 class="my-4">Articles</h1>
                    <form action="SupprimerBD.php" method="POST" >
                        <div class="row">
                        <?php
                              try
                              {
                                      $bdd = new PDO('mysql:host=localhost;dbname=ecommerce;charset=utf8', 'root', '');
                              }
                              catch(Exception $e)
                              {
                                      die('Erreur : '.$e->getMessage());
                              }

                              $articles= $bdd->query("SELECT Ref,Nom,Image,Description,Quantite  FROM article");?>

                              <?php 
                              $count=0;
                              while ($donnee = $articles->fetch()){
                                  if ($donnee['Quantite']==0){?>
                                    <div class="col-lg-4 col-sm-6 mb-4 ">
                                      <div class="card h-100">
                                        <img class="card-img-top" src="<?php echo $donnee['Image'];?>" alt="">
                                        <div class="card-body ">
                                          <h4 class="card-title">
                                              <input type="checkbox" name="checkbox[]" value='<?php echo$donnee['Ref']."_";?>'>
                                              <a href="#"><?php echo $donnee['Nom'];?></a>
                                          </h4>
                                          <p class="card-text"><?php echo $donnee['Description'];?></p>
                                        </div>
                                      </div>
                                    </div>
                              <?php
                                    $count=$count+1;
                                  }
                                }
                                if ($count==0){
                                  header('Location: Liste.php?message=faux'); 
                                }
                                ?>
                        </div>
                        <input type="submit">
                    </form>
        </section>
        
        <footer class="py-5 bg-dark">
            <div class="container">
              <p class="m-0 text-center text-white">Téléphone : 01.68.85.20.03          Adresse : 6 rue de la mode, Paris</p>
            </div>
            <!-- /.container -->
        </footer>
        <!-- /.container -->
    </body>
</html>
