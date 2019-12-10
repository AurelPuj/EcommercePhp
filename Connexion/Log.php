
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
              </ul>
            </div>
          </div>
        </nav>
     
        
        <div class="container-fluid">
        <div class="row no-gutter">
          <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
          <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
              <div class="container">
                <div class="row">
                  <div class="col-md-9 col-lg-8 mx-auto">
                    <h3 class="login-heading mb-4">Connexion</h3>
                    <form action="http://localhost/EcommercePhp/Connexion/Checkup.php?value=connexion" method="POST">
                       <div class="form-label-group">
                           <select name="inputType" id="inputType" class="form-control">
                               <option value="Client">Client</option>
                               <option value="Manager">Manager</option>
                           </select>
                       </div>
                        
                      <div class="form-label-group">
                        <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                        <label for="inputEmail">Email</label>
                      </div>

                      <div class="form-label-group">
                        <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
                        <label for="inputPassword">Mot de passe</label>
                      </div>

                      <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Se souvenir de moi</label>
                      </div>
                      <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Se connecter</button>
                      <div class="text-center">
                        <a class="small" href="#">Mot de passe oublié ?</a></div>
                      <div class="text-center">  
                        <a class="small" href="http://localhost/EcommercePhp/Connexion/NouvelUtilisateur.php">Créer un compte</a></div>
                    </form>
                        <?php
                        if(isset($_GET['message'])){
                            if($_GET['message']=='faux'){
                            echo "<p style='color:red'>Login est incorrect</p>";
                            }
                            if($_GET['message']== 'error_password'){
                            echo "<p style='color:red'>Mot de passe incorrect </p>";}
                            }
                        ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        
         
        <footer class="py-5 bg-dark">
        <div class="container">
          <p class="m-0 text-center text-white">Téléphone : 01.68.85.20.03          Adresse : 6 rue de la mode, Paris</p>
        </div>
        <!-- /.container allo -->
        </footer>
    </body>
</html>

