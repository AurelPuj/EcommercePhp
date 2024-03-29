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
                <li class="nav-item">
                          <a class="nav-link" href="http://localhost/EcommercePhp/Admin/AdminComs.php">Commentaire</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        
         <form action="http://localhost/EcommercePhp/Admin/recup.php" method="post">
                <section class="py-5"> 
                        <!-- Page Content -->
                        <div class="container">

                          <!-- Portfolio Item Heading -->
                          <h1 class="my-4">
                                <input name="NomProduit" id="NomProduit" class="form-control" placeholder="Nom du produit" required autofocus>
                          </h1>

                          <!-- Portfolio Item Row -->
                          <div class="row">

                            <div class="col-md-8">
                              <img class="img-fluid" src="https://www.humanprogresscenter.com/wp-content/uploads/2016/05/fond-gris.jpg" alt="">
                              <input name="Url" id="Url" class="form-control" placeholder="Url" required autofocus>
                            </div>

                            <div class="col-md-4">
                              <h3 class="my-3">Description</h3>
                              <input name="Description" id="Description" class="form-control" required autofocus>

                                <div class="form-label-group">
                                    <label for="catégorie">Catégorie</label>
                                    <select name="Catégorie" id="catégorie" class="form-control">
                                        <option value="Haut">Haut</option>
                                        <option value="Bas">Bas</option>
                                        <option value="Chaussures">Chaussures</option>
                                    </select>
                                    
                                </div>

                                <div class="form-label-group">
                                    <label for="marque">Marque</label>
                                    <select name="Marque" id="marque" class="form-control">
                                        <option value="H&M">H&M</option>
                                        <option value="H&MDesign">H&MDesign</option>
                                        <option value="H&MEnfant">H&MEnfant</option>
                                    </select>
                                </div>
                                <label for="Quantité">Quantité</label>
                                <input name="Quantité" id="Quantité" class="form-control" required autofocus>
                                <label for="Prix">Prix</label>
                                <input name="Prix" id="Prix" class="form-control" required autofocus>
                                <label for="TVA">TVA</label>
                                <input name="TVA" id="TVA" class="form-control" required autofocus>
                                
                            </div>
                              
                            

                          </div>
                          <!-- /.row -->

                          <!-- Related Projects Row -->
                          <input type="submit" value="Envoyer" />

                        </div>
                        <!-- /.container -->
                </section>
         </form>
             
        <footer class="py-5 bg-dark">
            <div class="container">
              <p class="m-0 text-center text-white">Téléphone : 01.68.85.20.03          Adresse : 6 rue de la mode, Paris</p>
            </div>
            <!-- /.container -->
        </footer>
    </body>
</html>
