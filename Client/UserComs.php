<?php
session_start();
$_SESSION['type'] = $_SESSION['type'];
$_SESSION['email']= $_SESSION['email'];
$_SESSION['timeout_idle'] = time() + 2*24*60;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";
$connect = mysqli_connect($servername, $username, $password, $dbname);
if (!$connect) {
    echo "Echec de Connection : " . mysqli_connect_error();
}
    $email = $_SESSION['email'];
        
        
?>
<html>
    <head>
          <link rel="icon" type="image/ico" href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/H%26M-Logo.svg/1200px-H%26M-Logo.svg.png" />
        <title>Commentaire</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/logIn.css" rel="stylesheet">
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
                  <a class="nav-link" href="http://localhost/EcommercePhp/Acceuil/index.html">Acceuil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="http://localhost/EcommercePhp/Connexion/Log.php">Connexion</a>

                </li>
                <li class="nav-item">
                          <a class="nav-link" href="http://localhost/EcommercePhp/Client/UserComs.php">Commentaire</a>
                        </li>
              </ul>
            </div>
          </div>
        </nav>
     
        <section class="py-5">
        <div class="container-fluid">
        <div class="row no-gutter">
            <div class="col-md-8 col-lg-6">
              <div class="login d-flex align-items-center py-5">
                <div class="container">
                   <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                         <h3 class="login-heading mb-4">Laisser un commentaire</h3>
                         <form action="http://localhost/EcommercePhp/Client/checkupComs.php?value=search" method="POST" >
                             <div class="form-label-group">
                                <label for="commentaire">Votre commentaire :</label>
                                <textarea class="form-control" name="commentaire" id="commentaire" placeholder="Tapez votre commentaire" maxlength="255" rows="15"></textarea>
                             </div>
                             <div class="form-label-group">
                             <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Envoyer</button>
                             </div>
                         </form>
                         <?php
                    if(isset($_GET['message'])){
                        if($_GET['message']=='faux'){
                            echo "<p style='color:red'>Erreur de connexion</p>";}
                        if($_GET['message']== 'vrai'){
                            echo "<p style='color:green'>Commentaire envoyé !</p>";}
                    }
                        ?>
                        </div>
                    </div>
                </div>
             </div>
            </div>
          <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
              <div class="container">
                <div class="row">
                  <div class="col-md-9 col-lg-8 mx-auto">
                    <h3 class="login-heading mb-4">Vos anciens commentaire(s) et réponse(s)</h3>
                    <?php
                      try
                                        {
                                                $bdd = new PDO('mysql:host=localhost;dbname=ecommerce;charset=utf8', 'root', '');
                                        }
                                        catch(Exception $e)
                                        {
                                                die('Erreur : '.$e->getMessage());
                                        }
                                        $articles= $bdd->query("SELECT commentaire,id_com, reponse FROM commentaire WHERE email ='$email'");

                                        while ($donnee = $articles->fetch()){   
                                                ?>
                                                      <div class="col-lg-10 col-sm-6 mb-4">
                                                        <form>
                                                        
                                                            <div class="card">
                                                                <p class="card-text">Vous :</p>
                                                                <p class="card-text"><?php echo $donnee['commentaire'];?></p>
                                                                <?php
                                                                if($donnee['reponse'] != ""){?>
                                                                <div class="card">
                                                                <p class="card-text">Admin :</p>
                                                                <p class="card-text"><?php echo $donnee['reponse'];?></p>
                                                                </div>
                                                                <?php } ?>
                                                            </div>
                                                        
                                                       </form>
                                                      </div>
                                                <?php 
                                        } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
        </section>
        
        <footer class="py-5 bg-dark">
        <div class="container">
          <p class="m-0 text-center text-white">Téléphone : 01.68.85.20.03          Adresse : 6 rue de la mode, Paris</p>
        </div>
        </footer>
    </body>
</html>                                               