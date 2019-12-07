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
                  <a class="nav-link" href="http://localhost/EcommercePhp/Admin/index.html">Admin</a>

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
                            
                            $Prixmin=$_POST['Prixmin'];
                            $Prixmax=$_POST['Prixmax'];
                            $Catégorie=$_POST['Catégorie'];
                            $Marque=$_POST['Marque'];
                          
                            if ($Prixmin==NULL && $Prixmax==NULL && $Catégorie=='nothing' && $Marque=='nothing'){
                                $articles= $bdd->query("SELECT Nom,Image,Description,Quantité,Marque,Prix  FROM article");
                                while ($donnee = $articles->fetch()){
                                        if ($donnee['Quantité']!=0){    
                                        ?>
                                              <div class="col-lg-4 col-sm-6 mb-4">
                                                <div class="card h-100">
                                                  <img class="card-img-top" src="<?php echo $donnee['Image'];?>" alt="">
                                                  <div class="card-body">
                                                    <h4 class="card-title">
                                                      <a href="#"><?php echo $donnee['Nom'];?></a>
                                                    </h4>
                                                    <p class="card-text"><?php echo $donnee['Description'];?></p>
                                                    <p class="card-text">Catégorie :<?php echo $donnee['Catégorie'];?></p>
                                                    <p class="card-text">Marque :<?php echo $donnee['Marque'];?></p>
                                                    <p class="card-text">Prix :<?php echo $donnee['Prix'];?></p>
                                                    <input type="text" name="QuantitéAchat">
                                                    <label for="QuantitéAchat">Quantité</label>
                                                    <input class="form-control" type="submit" value="Acheter" />
                                                  </div>
                                                </div>
                                              </div>
                                        <?php }
                                }
                            }else if ($Prixmin!=NULL && $Prixmax==NULL && $Catégorie=='nothing' && $Marque=='nothing'){
                                $articles= $bdd->query("SELECT Nom,Image,Description,Quantité  FROM article WHERE Prix > '$Prixmin'");
                                while ($donnee = $articles->fetch()){
                                        if ($donnee['Quantité']!=0){    
                                        ?>
                                              <div class="col-lg-4 col-sm-6 mb-4">
                                                <div class="card h-100">
                                                  <img class="card-img-top" src="<?php echo $donnee['Image'];?>" alt="">
                                                  <div class="card-body">
                                                    <h4 class="card-title">
                                                      <a href="#"><?php echo $donnee['Nom'];?></a>
                                                    </h4>
                                                    <p class="card-text"><?php echo $donnee['Description'];?></p>
                                                  </div>
                                                </div>
                                              </div>
                                        <?php }
                                }
                            }else if ($Prixmin!=NULL && $Prixmax==NULL && $Catégorie!="nothing" && $Marque=='nothing'){
                                $articles= $bdd->query("SELECT Nom,Image,Description,Quantité  FROM article WHERE Prix > '$Prixmin' AND Catégorie = '$Catégorie'");
                                while ($donnee = $articles->fetch()){
                                        if ($donnee['Quantité']!=0){    
                                        ?>
                                              <div class="col-lg-4 col-sm-6 mb-4">
                                                <div class="card h-100">
                                                  <img class="card-img-top" src="<?php echo $donnee['Image'];?>" alt="">
                                                  <div class="card-body">
                                                    <h4 class="card-title">
                                                      <a href="#"><?php echo $donnee['Nom'];?></a>
                                                    </h4>
                                                    <p class="card-text"><?php echo $donnee['Description'];?></p>
                                                  </div>
                                                </div>
                                              </div>
                                        <?php }
                                }
                            }else if ($Prixmin!=NULL && $Prixmax==NULL && $Catégorie=="nothing" && $Marque!='nothing'){
                                $articles= $bdd->query("SELECT Nom,Image,Description,Quantité  FROM article WHERE Prix > '$Prixmin' AND Marque = '$Marque'");
                                while ($donnee = $articles->fetch()){
                                        if ($donnee['Quantité']!=0){    
                                        ?>
                                              <div class="col-lg-4 col-sm-6 mb-4">
                                                <div class="card h-100">
                                                  <img class="card-img-top" src="<?php echo $donnee['Image'];?>" alt="">
                                                  <div class="card-body">
                                                    <h4 class="card-title">
                                                      <a href="#"><?php echo $donnee['Nom'];?></a>
                                                    </h4>
                                                    <p class="card-text"><?php echo $donnee['Description'];?></p>
                                                  </div>
                                                </div>
                                              </div>
                                        <?php }
                                }
                            }else if ($Prixmin!=NULL && $Prixmax==NULL && $Catégorie!="nothing" && $Marque!='nothing'){
                                $articles= $bdd->query("SELECT Nom,Image,Description,Quantité  FROM article WHERE Prix > '$Prixmin' AND Catégorie='$Catégorie'  AND Marque = '$Marque'");
                                while ($donnee = $articles->fetch()){
                                        if ($donnee['Quantité']!=0){    
                                        ?>
                                              <div class="col-lg-4 col-sm-6 mb-4">
                                                <div class="card h-100">
                                                  <img class="card-img-top" src="<?php echo $donnee['Image'];?>" alt="">
                                                  <div class="card-body">
                                                    <h4 class="card-title">
                                                      <a href="#"><?php echo $donnee['Nom'];?></a>
                                                    </h4>
                                                    <p class="card-text"><?php echo $donnee['Description'];?></p>
                                                  </div>
                                                </div>
                                              </div>
                                        <?php }
                                }
                            }else if ($Prixmin==NULL && $Prixmax!=NULL && $Catégorie=='nothing' && $Marque=='nothing'){
                                $articles= $bdd->query("SELECT Nom,Image,Description,Quantité  FROM article WHERE Prix < '$Prixmax'");
                                while ($donnee = $articles->fetch()){
                                        if ($donnee['Quantité']!=0){    
                                        ?>
                                              <div class="col-lg-4 col-sm-6 mb-4">
                                                <div class="card h-100">
                                                  <img class="card-img-top" src="<?php echo $donnee['Image'];?>" alt="">
                                                  <div class="card-body">
                                                    <h4 class="card-title">
                                                      <a href="#"><?php echo $donnee['Nom'];?></a>
                                                    </h4>
                                                    <p class="card-text"><?php echo $donnee['Description'];?></p>
                                                  </div>
                                                </div>
                                              </div>
                                        <?php }
                                }
                            }else if ($Prixmin==NULL && $Prixmax!=NULL && $Catégorie!="nothing" && $Marque=='nothing'){
                                $articles= $bdd->query("SELECT Nom,Image,Description,Quantité  FROM article WHERE Prix<'$Prixmax' AND Catégorie = '$Catégorie'");
                                while ($donnee = $articles->fetch()){
                                        if ($donnee['Quantité']!=0){    
                                        ?>
                                              <div class="col-lg-4 col-sm-6 mb-4">
                                                <div class="card h-100">
                                                  <img class="card-img-top" src="<?php echo $donnee['Image'];?>" alt="">
                                                  <div class="card-body">
                                                    <h4 class="card-title">
                                                      <a href="#"><?php echo $donnee['Nom'];?></a>
                                                    </h4>
                                                    <p class="card-text"><?php echo $donnee['Description'];?></p>
                                                  </div>
                                                </div>
                                              </div>
                                        <?php }
                                }
                            }else if ($Prixmin==NULL && $Prixmax!=NULL && $Catégorie=="nothing" && $Marque!='nothing'){
                                $articles= $bdd->query("SELECT Nom,Image,Description,Quantité  FROM article WHERE Prix<'$Prixmax' AND Marque = '$Marque'");
                                while ($donnee = $articles->fetch()){
                                        if ($donnee['Quantité']!=0){    
                                        ?>
                                              <div class="col-lg-4 col-sm-6 mb-4">
                                                <div class="card h-100">
                                                  <img class="card-img-top" src="<?php echo $donnee['Image'];?>" alt="">
                                                  <div class="card-body">
                                                    <h4 class="card-title">
                                                      <a href="#"><?php echo $donnee['Nom'];?></a>
                                                    </h4>
                                                    <p class="card-text"><?php echo $donnee['Description'];?></p>
                                                  </div>
                                                </div>
                                              </div>
                                        <?php }
                                }
                            }else if ($Prixmin==NULL && $Prixmax!=NULL && $Catégorie!="nothing" && $Marque!='nothing'){
                                $articles= $bdd->query("SELECT Nom,Image,Description,Quantité  FROM article WHERE Prix<'$Prixmax' AND Catégorie='$Catégorie'  AND Marque = '$Marque'");
                                while ($donnee = $articles->fetch()){
                                        if ($donnee['Quantité']!=0){    
                                        ?>
                                              <div class="col-lg-4 col-sm-6 mb-4">
                                                <div class="card h-100">
                                                  <img class="card-img-top" src="<?php echo $donnee['Image'];?>" alt="">
                                                  <div class="card-body">
                                                    <h4 class="card-title">
                                                      <a href="#"><?php echo $donnee['Nom'];?></a>
                                                    </h4>
                                                    <p class="card-text"><?php echo $donnee['Description'];?></p>
                                                  </div>
                                                </div>
                                              </div>
                                        <?php }
                                }
                            }else if ($Prixmin!=NULL && $Prixmax!=NULL && $Catégorie=='nothing' && $Marque=='nothing'){
                                $articles= $bdd->query("SELECT Nom,Image,Description,Quantité  FROM article WHERE Prix BETWEEN '$Prixmin' AND '$Prixmax'");
                                while ($donnee = $articles->fetch()){
                                        if ($donnee['Quantité']!=0){    
                                        ?>
                                              <div class="col-lg-4 col-sm-6 mb-4">
                                                <div class="card h-100">
                                                  <img class="card-img-top" src="<?php echo $donnee['Image'];?>" alt="">
                                                  <div class="card-body">
                                                    <h4 class="card-title">
                                                      <a href="#"><?php echo $donnee['Nom'];?></a>
                                                    </h4>
                                                    <p class="card-text"><?php echo $donnee['Description'];?></p>
                                                  </div>
                                                </div>
                                              </div>
                                        <?php }
                                }
                            }else if ($Prixmin!=NULL && $Prixmax!=NULL && $Catégorie!="nothing" && $Marque=='nothing'){
                                $articles= $bdd->query("SELECT Nom,Image,Description,Quantité  FROM article WHERE Prix BETWEEN '$Prixmin' AND '$Prixmax' AND Catégorie = '$Catégorie'");
                                while ($donnee = $articles->fetch()){
                                        if ($donnee['Quantité']!=0){    
                                        ?>
                                              <div class="col-lg-4 col-sm-6 mb-4">
                                                <div class="card h-100">
                                                  <img class="card-img-top" src="<?php echo $donnee['Image'];?>" alt="">
                                                  <div class="card-body">
                                                    <h4 class="card-title">
                                                      <a href="#"><?php echo $donnee['Nom'];?></a>
                                                    </h4>
                                                    <p class="card-text"><?php echo $donnee['Description'];?></p>
                                                  </div>
                                                </div>
                                              </div>
                                        <?php }
                                }
                            }else if ($Prixmin!=NULL && $Prixmax!=NULL && $Catégorie=="nothing" && $Marque!='nothing'){
                                $articles= $bdd->query("SELECT Nom,Image,Description,Quantité  FROM article WHERE Prix BETWEEN '$Prixmin' AND '$Prixmax' AND Marque = '$Marque'");
                                while ($donnee = $articles->fetch()){
                                        if ($donnee['Quantité']!=0){    
                                        ?>
                                              <div class="col-lg-4 col-sm-6 mb-4">
                                                <div class="card h-100">
                                                  <img class="card-img-top" src="<?php echo $donnee['Image'];?>" alt="">
                                                  <div class="card-body">
                                                    <h4 class="card-title">
                                                      <a href="#"><?php echo $donnee['Nom'];?></a>
                                                    </h4>
                                                    <p class="card-text"><?php echo $donnee['Description'];?></p>
                                                  </div>
                                                </div>
                                              </div>
                                        <?php }
                                }
                            }else if ($Prixmin!=NULL && $Prixmax!=NULL && $Catégorie!="nothing" && $Marque!='nothing'){
                                $articles= $bdd->query("SELECT Nom,Image,Description,Quantité  FROM article WHERE Prix BETWEEN '$Prixmin' AND '$Prixmax' AND Catégorie='$Catégorie'  AND Marque = '$Marque'");
                                while ($donnee = $articles->fetch()){
                                        if ($donnee['Quantité']!=0){    
                                        ?>
                                              <div class="col-lg-4 col-sm-6 mb-4">
                                                <div class="card h-100">
                                                  <img class="card-img-top" src="<?php echo $donnee['Image'];?>" alt="">
                                                  <div class="card-body">
                                                    <h4 class="card-title">
                                                      <a href="#"><?php echo $donnee['Nom'];?></a>
                                                    </h4>
                                                    <p class="card-text"><?php echo $donnee['Description'];?></p>
                                                  </div>
                                                </div>
                                              </div>
                                        <?php }
                                }
                            }else if ($Prixmin==NULL && $Prixmax==NULL && $Catégorie!='nothing' && $Marque=='nothing'){
                                $articles= $bdd->query("SELECT Nom,Image,Description,Quantité  FROM article WHERE Catégorie='$Catégorie'");
                                while ($donnee = $articles->fetch()){
                                        if ($donnee['Quantité']!=0){    
                                        ?>
                                              <div class="col-lg-4 col-sm-6 mb-4">
                                                <div class="card h-100">
                                                  <img class="card-img-top" src="<?php echo $donnee['Image'];?>" alt="">
                                                  <div class="card-body">
                                                    <h4 class="card-title">
                                                      <a href="#"><?php echo $donnee['Nom'];?></a>
                                                    </h4>
                                                    <p class="card-text"><?php echo $donnee['Description'];?></p>
                                                  </div>
                                                </div>
                                              </div>
                                        <?php }
                                }
                            }else if ($Prixmin==NULL && $Prixmax==NULL && $Catégorie!='nothing' && $Marque!='nothing'){
                                $articles= $bdd->query("SELECT Nom,Image,Description,Quantité  FROM article WHERE Catégorie='$Catégorie' AND Marque = '$Marque'");
                                while ($donnee = $articles->fetch()){
                                        if ($donnee['Quantité']!=0){    
                                        ?>
                                              <div class="col-lg-4 col-sm-6 mb-4">
                                                <div class="card h-100">
                                                  <img class="card-img-top" src="<?php echo $donnee['Image'];?>" alt="">
                                                  <div class="card-body">
                                                    <h4 class="card-title">
                                                      <a href="#"><?php echo $donnee['Nom'];?></a>
                                                    </h4>
                                                    <p class="card-text"><?php echo $donnee['Description'];?></p>
                                                  </div>
                                                </div>
                                              </div>
                                        <?php }
                                }
                            }else if ($Prixmin==NULL && $Prixmax==NULL && $Catégorie=='nothing' && $Marque!='nothing'){
                                $articles= $bdd->query("SELECT Nom,Image,Description,Quantité  FROM article WHERE Marque = '$Marque'");
                                while ($donnee = $articles->fetch()){
                                        if ($donnee['Quantité']!=0){    
                                        ?>
                                              <div class="col-lg-4 col-sm-6 mb-4">
                                                <div class="card h-100">
                                                  <img class="card-img-top" src="<?php echo $donnee['Image'];?>" alt="">
                                                  <div class="card-body">
                                                    <h4 class="card-title">
                                                      <a href="#"><?php echo $donnee['Nom'];?></a>
                                                    </h4>
                                                    <p class="card-text"><?php echo $donnee['Description'];?></p>
                                                  </div>
                                                </div>
                                              </div>
                                        <?php }
                                }
                            }
                    ?>
                            
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
