<?php
session_start();
$_SESSION['type'] = $_SESSION['type'];
$_SESSION['email']= $_SESSION['email'];
$_SESSION['timeout_idle'] = time() + 2*24*60;
if (isset($_GET['message'])){
    if ($_GET['message']=='vide'){
        echo '<script type="text/javascript">window.alert("Le Panier est vide !");</script>';
    }
    if ($_GET['message']=='insuffisant'){
        echo '<script type="text/javascript">window.alert("Pas assez de Stock !");</script>';
    }
    if ($_GET['message']=='payement'){
        echo '<script type="text/javascript">window.alert("Payement effectué !");</script>';
    }
}
?>

<html>
    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <link rel="icon" type="image/ico" href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/H%26M-Logo.svg/1200px-H%26M-Logo.svg.png" />
        <title>H&M</title>
        
    </head>
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
        
                <section class="py-5"> 
                        <!-- Page Content -->
                        <div class="container">

                          <!-- Portfolio Item Row -->
                            <div class="my-4">
                                <form action="http://localhost/EcommercePhp/Client/ListeClient.php" method="post">
                                <div class="form-label-group">
                                    <label for="catégorie">Catégorie</label>
                                    <select name="Catégorie" id="catégorie" class="form-control">
                                        <option value="nothing"></option>
                                        <option value="Haut">Haut</option>
                                        <option value="Bas">Bas</option>
                                        <option value="Chaussures">Chaussures</option>
                                    </select>
                                    
                                </div>

                                <div class="form-label-group">
                                    <label for="marque">Marque</label>
                                    <select name="Marque" id="marque" class="form-control">
                                        <option value="nothing"></option>
                                        <option value="H&M">H&M</option>
                                        <option value="H&MDesign">H&MDesign</option>
                                        <option value="H&MEnfant">H&MEnfant</option>
                                    </select>
                                </div>
                                
                                
                            <!-- Portfolio Item Heading -->
                            <h1 class="my-4">
                                <input type="text" name="Prixmin" id="Prixmin" class="form-control" placeholder="Prixmin"autofocus>
                            </h1>
                            
                            <h1 class="my-4">
                                <input type="text" name="Prixmax" id="Prixmax" class="form-control" placeholder="Prixmax"autofocus>
                            </h1>
                            <div class="my-4">
                                <input class="form-control" type="submit" value="Rechercher" />
                            </div>  
                                </form>
                            </div>
                            
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
                                        $articles= $bdd->query("SELECT Nom,Image,Description,Quantite,Marque,Prix,Catégorie  FROM article");

                                        while ($donnee = $articles->fetch()){
                                                if ($donnee['Quantite']>0){    
                                                ?>
                                                      <div class="col-lg-4 col-sm-6 mb-4">
                                                        <form action="http://localhost/EcommercePhp/Client/Commande.php" method="post">
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
                                                                <input type="hidden" name="Nom" value="<?php echo $donnee['Nom'];?>">
                                                                <input type="hidden" name="Image" value="<?php echo $donnee['Image'];?>">
                                                                <input type="hidden" name="Prix" value="<?php echo $donnee['Prix'];?>">
                                                                <input type="hidden" name="Catégorie" value="<?php echo $donnee['Catégorie'];?>">
                                                                <label for="QuantitéAchat">Quantité</label>
                                                            </div>
                                                          <input class="form-control" type="submit" value="Acheter" />
                                                        </div>
                                                        
                                                       </form>
                                                      </div>
                                                <?php }
                                        }?>
                                      
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
