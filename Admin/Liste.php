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
    if (isset($_GET['message'])){
    if ($_GET['message']=='vrai'){
        echo '<script type="text/javascript">window.alert("Suppression Réussi !");</script>';
    }
    if ($_GET['message']=='faux'){
        echo '<script type="text/javascript">window.alert("Aucun Article à Supprimer !");</script>';
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
        <meta charset="UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <link rel="icon" type="image/ico" href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/H%26M-Logo.svg/1200px-H%26M-Logo.svg.png" />
        <title>H&M</title>
        
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
                    <a class="nav-link" href="http://localhost/EcommercePhp/Admin/Acceuil.php">Acceuil</a>
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
              </ul>
            </div>
          </div>
        </nav>
         
         <section class="py-5">
                <!-- Page Content -->
                <div class="container">

                  <!-- Page Heading -->
                  <h1 class="my-4">Articles</h1>
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

                          $articles= $bdd->query("SELECT Nom,Image,Description,Quantite,Marque,Prix,Catégorie,TVA  FROM article");
                          while ($donnee = $articles->fetch()){
                                
                                                ?>
                                                      <div class="col-lg-4 col-sm-6 mb-4">
                                                        <form action="http://localhost/EcommercePhp/Admin/Modifier.php" method="post">
                                                        <div class="card h-100">
                                                          <img class="card-img-top" src="<?php echo $donnee['Image'];?>" alt="">
                                                          
                                                            <div class="card-body">
                                                                <h4 class="card-title">
                                                                  <a href="#"><?php echo $donnee['Nom'];?></a>
                                                                </h4>
                                                                <p class="card-text"><?php echo $donnee['Description'];?></p>
                                                                <p class="card-text" name="fesse">Catégorie :<?php echo $donnee['Catégorie'];?></p>
                                                                <p class="card-text">Marque :<?php echo $donnee['Marque'];?></p>
                                                                <p class="card-text">Prix :<?php echo $donnee['Prix'];?></p>
                                                                <p class="card-text">Quantité :<?php echo $donnee['Quantite'];?></p>
                                                                <input type="hidden" name="Nom" value="<?php echo $donnee['Nom'];?>">
                                                                <input type="hidden" name="Image" value="<?php echo $donnee['Image'];?>">
                                                                <input type="hidden" name="Prix" value="<?php echo $donnee['Prix'];?>">
                                                                <input type="hidden" name="Catégorie" value="<?php echo $donnee['Catégorie'];?>">
                                                                <input type="hidden" name="Marque" value="<?php echo $donnee['Marque'];?>">
                                                                <input type="hidden" name="TVA" value="<?php echo $donnee['TVA'];?>">
                                                                <input type="hidden" name="Quantite" value="<?php echo $donnee['Quantite'];?>">
                                                                <input type="hidden" name="Description" value="<?php echo $donnee['Description'];?>">
                                                            </div>
                                                          <input class="form-control" type="submit" value="Modifier" />
                                                        </div>
                                                        
                                                       </form>
                                                      </div>
                                                <?php }?>
                    
                </div>
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
