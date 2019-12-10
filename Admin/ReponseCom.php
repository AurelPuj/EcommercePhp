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
        <div class="container-fluid">
        <div class="row no-gutter">
            <div class="col-md-8 col-lg-6">
              <div class="login d-flex align-items-center py-5">
                <div class="container">
                   <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                         <h3 class="login-heading mb-4">Repondre</h3>
                         <?php
        if (isset($_POST['checkbox']) && is_array($_POST['checkbox'])){
        foreach ($_POST['checkbox'] as $checkbox){
           $tabcheckbox= explode("_",$checkbox);
           foreach ($tabcheckbox as $del){
               $sql="SELECT commentaire,email,id_com FROM commentaire WHERE id_com='$del'";
               $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) >0) {
            $row = mysqli_fetch_assoc($result);
            
        }
                          }
           }
        }else{
            echo '<script type="text/javascript">window.alert("Aucune case séléctionnée !");</script>';
            header('Location: AdminComs.php?message=rien'); 
        }
           ?>       <p class="card-text"><?php echo $row['email'];?></p>
           
                    <p class="card-text"><?php echo $row['commentaire'];?></p>
                    <form action="http://localhost/EcommercePhp/Admin/checkupComsAdmin.php?value=rep" method="POST" >
                             <div class="form-label-group">
                                <label for="reponse">Votre reponse :</label>
                                <textarea class="form-control" name="reponse" id="reponse" placeholder="Tapez votre reponse" maxlength="999" rows="15"></textarea>
                                 <input type="hidden" name="id_com" id="id_com" value="<?php echo $row['id_com']; ?> ">
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
                    <h3 class="login-heading mb-4">ADMIN</h3>
                    <?php
                      try
                                        {
                                                $bdd = new PDO('mysql:host=localhost;dbname=ecommerce;charset=utf8', 'root', '');
                                        }
                                        catch(Exception $e)
                                        {
                                                die('Erreur : '.$e->getMessage());
                                        }
                                        $articles= $bdd->query("SELECT commentaire,id_com, reponse, email FROM commentaire");

                                        while ($donnee = $articles->fetch()){   
                                                ?>
                                                      <div class="col-lg-10 col-sm-6 mb-4">
                                                        <form>
                                                        
                                                            <div class="card">
                                                                <p class="card-text"><?php echo $donnee['email'];?></p>
                                                                <p class="card-text"><?php echo $donnee['commentaire'];?></p>
                                                                <?php
                                                                if($donnee['reponse'] != ""){?>
                                                                <div class="card">
                                                                <p class="card-text">Admin</p>
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