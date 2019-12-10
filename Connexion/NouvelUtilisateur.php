<?php
session_start();
$_SESSION['type'] = $_SESSION['type'];
$_SESSION['email']= $_SESSION['email'];
$_SESSION['timeout_idle'] = time() + 2*24*60;
?>

<html>
    <head>
          <link rel="icon" type="image/ico" href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/H%26M-Logo.svg/1200px-H%26M-Logo.svg.png" />
        <title>Connexion</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/logIn.css" rel="stylesheet">
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
                  <a class="nav-link" href="http://localhost/EcommercePhp/Acceuil/index.html">Accueil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="http://localhost/EcommercePhp/Connexion/Log.php">Connexion</a>

                </li>
              </ul>
            </div>
          </div>
        </nav>
     
        //
        <div class="container-fluid">
        <div class="row no-gutter">
          <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
          <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
              <div class="container">
                <div class="row">
                  <div class="col-md-9 col-lg-8 mx-auto">
                    <h3 class="login-heading mb-4">Créer un compte</h3>
                    <form action="http://localhost/EcommercePhp/Connexion/Checkup.php?value=inscription" method="POST">
                      <div class="form-label-group">
                        <input type="text" name="inputNom" id="inputNom" class="form-control" placeholder="Nom" required autofocus>
                        <label for="inputNom">Nom (*)</label>
                      </div>
                        
                      <div class="form-label-group">
                        <input type="text" name="inputPrenom" id="inputPrenom" class="form-control" placeholder="Prenom" required autofocus>
                        <label for="inputPrenom">Prenom (*)</label>
                      </div>
                        
                      <div class="form-label-group">
                        <input type="int" name="inputNumero" id="inputNumero" class="form-control" placeholder="Numero" required autofocus>
                        <label for="inputNumero">Numero de téléphone (*)</label>
                      </div>
                        
                      <div class="form-label-group">
                           <select name=inputSexe id="inputSexe" class="form-control">
                               <option value="">Choisir...</option>
                               <option value="Masculin">Masculin</option>
                               <option value="Feminin">Feminin</option>
                               <option value="Autre">Autre</option>
                           </select>
                       </div>
                        
                        <div class="form-label-group">
                           <select name=inputSituation id="inputSituation" class="form-control">
                               <option value="">Choisir...</option>
                               <option value="M">Marié</option>
                               <option value="P">Pacsé</option>
                               <option value="D">Divorcé</option>
                               <option value="S">Séparé</option>
                               <option value="C">Célibataire</option>
                               <option value="V">Veuf</option>
                           </select>
                       </div>
                        
                       <div class="form-label-group">
                        <input type="date" name="inputDate_naissance" id="inputDate_naissance" class="form-control" placeholder="Date_naissance" autofocus>
                        <label for="inputDate_naissance">Date de naissance </label>
                      </div>
                        
                      <div class="form-label-group">
                        <input type="text" name="inputZip" id="inputZip" class="form-control" placeholder="Zip Code" required autofocus>
                        <label for="inputZip">ZiP Code (*)</label>
                      </div>
                        
                       <div class="form-label-group">
                         <input type="text" name="inputAdresse" id="inputAdresse" class="form-control" placeholder="Adresse" required autofocus>
                        <label for="inputAdresse">Adresse (*)</label>
                       </div>
                        
                      <div class="form-label-group">
                        <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                        <label for="inputEmail">Email (*)</label>
                      </div>

                      <div class="form-label-group">
                        <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
                        <label for="inputPassword">Nouveau mot de passe (*)</label>
                      </div>
                        
                      <div class="form-label-group">
                        <input type="password" name="inputR_Password" id="inputR_Password" class="form-control" placeholder="R_Password" required>
                        <label for="inputR_Password">Répéter le mot de passe (*)</label>
                      </div>
           <!---          <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Se souvenir de moi</label>
                      </div>--->
                      <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Enregistrer</button>
                    
                    </form>
                    <?php
                    echo "* champ obligatoire";
                    if(isset($_GET['message'])){
                        if($_GET['message']=='faux'){
                            echo "<p style='color:red'>Erreur de connexion</p>";}
                        if($_GET['message']== 'vrai'){
                            echo "<p style='color:green'>Inscription validée</p>";}
                        if($_GET['message']== 'NP_invalide'){
                            echo "<p style='color:red'>Entrez un nom et prenom valide ! </p>";}
                        if($_GET['message']== 'Num_invalide'){
                            echo "<p style='color:red'>Entrez un numero valide ! </p>";}
                        if($_GET['message']== 'Zip_invalide'){
                            echo "<p style='color:red'>Entrez un ZIP valide ! </p>";}
                        if($_GET['message']== 'Pass_invalide'){
                            echo "<p style='color:red'>Entrez un password valide ! </p>";}
                        if($_GET['message']== 'Match_invalide'){
                            echo "<p style='color:red'>Erreur confirmation password ! </p>";}
                        if($_GET['message']== 'User_existant'){
                            echo "<p style='color:red'>Utilisateur deja existant </p>";}
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
        <!-- /.container -->
        </footer>
    </body>
</html>                                               
