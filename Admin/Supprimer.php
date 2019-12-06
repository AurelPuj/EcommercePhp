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

                              $articles= $bdd->query("SELECT Ref,Nom,Image,Description  FROM article");?>

                              <?php while ($donnee = $articles->fetch()){?>
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
                              <?php }?>
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
