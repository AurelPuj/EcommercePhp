
<html>
    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        
         <form action="http://localhost/EcommercePhp/Client/ListeClient.php" method="post">
                <section class="py-5"> 
                        <!-- Page Content -->
                        <div class="container">

                          <!-- Portfolio Item Row -->
                            <div class="my-4">
                                <div class="form-label-group">
                                    <label for="catégorie">Catégorie</label>
                                    <select name="Catégorie" id="catégorie" class="form-control">
                                        <option value="nothing"></option>
                                        <option value="haut">Haut</option>
                                        <option value="bas">Bas</option>
                                        <option value="chaussures">Chaussures</option>
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
                                
                            </div>
                            <div class="my-4">
                                <input class="form-control" type="submit" value="Rechercher" />
                            </div>  
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
