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
//
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
                        <li class="nav-item">
                          <a class="nav-link" href="http://localhost/EcommercePhp/Client/UserComs.php">Commentaire</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </nav>
        
        
                <section class="py-5"> 
                        <div class="container">
                            <div class="my-4">
                                <form action="http://localhost/EcommercePhp/Admin/AdminComs.php" method="POST">
                                <div class="form-label-group">
                                    <label for="etat">Recherche</label>
                                    <select name="etat" id="etat" class="form-control">
                                        <option value="tous">Tous</option>
                                        <option value="repondu">repondu</option>
                                        <option value="n_repondu">non repondu</option>
                                    </select>
                                    
                                </div>
                                <?php
                      try
                                        {
                                                $bdd = new PDO('mysql:host=localhost;dbname=ecommerce;charset=utf8', 'root', '');
                                        }
                                        catch(Exception $e)
                                        {
                                                die('Erreur : '.$e->getMessage());
                                        }
                                        $articles= $bdd->query("SELECT DISTINCT email FROM commentaire");
                                        ?>
                                        <div class="form-label-group">
                                        <select name="utilisateur" id="utilisateur" class="form-control">
                                            <option value="all">Tous</option>
                                            <?php
                                        while ($donnee = $articles->fetch()){   
                                                ?>
                                                <option value="<?php echo $donnee['email'];?>"><?php echo $donnee['email'];?></option>
                                                                <?php } ?>
                            <div class="my-4">
                                <input class="form-control" type="submit" value="Rechercher" />
                            </div> 
                                                <form action="http://localhost/EcommercePhp/Admin/AdminComs.php" method="POST">
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
                                        if(isset($_POST['etat']) && $_POST['utilisateur']){
                                            $etat = $_POST['etat'];
                                            $utilisateur = $_POST['utilisateur'];
                                        } else {
                                            $etat = "tous";
                                            $utilisateur = "all";
                                        }
                                        
                                        switch ($etat) {
                                            case "tous":
                                                 if($utilisateur == "all"){
                                                     $articles= $bdd->query("SELECT commentaire,id_com, reponse, email FROM commentaire");
                                                 } else {
                                                     $articles= $bdd->query("SELECT commentaire,id_com, reponse, email FROM commentaire WHERE email='$utilisateur'");
                                                 }
                                                break;
                                            case "repondu":
                                                   if($utilisateur == "all"){
                                                     $articles= $bdd->query("SELECT commentaire,id_com, reponse, email FROM commentaire WHERE reponse != 'aucune'  ");
                                                 } else {
                                                     $articles= $bdd->query("SELECT commentaire,id_com, reponse, email FROM commentaire WHERE email='$utilisateur' AND reponse != 'aucune'  ");
                                                 }     
                                                break;
                                            case "n_repondu":
                                                    if($utilisateur == "all"){
                                                     $articles= $bdd->query("SELECT commentaire,id_com, reponse, email FROM commentaire WHERE reponse = 'aucune' ");
                                                 } else {
                                                     $articles= $bdd->query("SELECT commentaire,id_com, reponse, email FROM commentaire WHERE email='$utilisateur' AND reponse = 'aucune' ");
                                                 }
                                                break;

                                            default:
                                                $articles= $bdd->query("SELECT commentaire,id_com, reponse, email FROM commentaire");
                                                break;
                                        }?>
                                <h4>Recherche pour utilisateur : <?php echo $etat ?> et etat : <?php echo $utilisateur ?></h4>
                                
                                <!---<form action="http://localhost/EcommercePhp/Client/checkupComs.php?value=rep" method="POST">--->
    
                                       <?php
                                        while ($donnee = $articles->fetch()){   
                                    
                                                ?>
                                                      <div class="col-lg-10 col-sm-6 mb-4">
                                                        <form id="item" action="http://localhost/EcommercePhp/Client/checkupComs.php?value=supp" method="POST">
                                                        
                                                            <div class="card">

                                                                <p class="card-text"><?php echo $donnee['email'];?></p>
                                                                <p class="card-text"><?php echo $donnee['commentaire'];?></p>
                                                                <input form="item" type="checkbox" name="checkbox[]" value='<?php echo $donnee['id_com']."_";?>'>
                                                                <?php
                                                                
                                                                if($donnee['reponse'] != ""){?>
                                                                <div class="card">
                                                                <p class="card-text">Admin :</p>
                                                                <p class="card-text"><?php echo $donnee['reponse'];?></p>
                                                             
                                                                </div>
                                                            
                                                                <?php 
                                                                
                                                                } ?>
                                                            </div>
                                                        <input form="item" class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" value="Supprimer" />
                                                        <input form="item" class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" value="Repondre" formaction="http://localhost/EcommercePhp/Admin/ReponseCom.php" />
                                                          </form>
                                                      </div>
                                                <?php 
                                        } ?>
                                     </form>
                                                
                            </div>
                                    <?php
                                        if(isset($_GET['message'])){
                                             if($_GET['message']=='faux'){
                                                echo "<p style='color:red'>Erreur de suppression</p>";}
                                             if($_GET['message']=='vrai'){
                                                 echo "<p style='color:green'>Suppression reussie</p>";}
                                             }
                                             ?>
                </section>
                
        
             
        <footer class="py-5 bg-dark">
            <div class="container">
              <p class="m-0 text-center text-white">Téléphone : 01.68.85.20.03          Adresse : 6 rue de la mode, Paris</p>
            </div>
            <!-- /.container -->
        </footer>
    </body>
</html>
