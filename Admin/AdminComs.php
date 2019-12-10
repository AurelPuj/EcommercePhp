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
    if (isset($_GET['message']) && $_GET['message']=='rien'){
        echo '<script type="text/javascript">window.alert("Aucune case cochée !");</script>';
    }
 ?>//
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
                        <div class="container">
                            <h4>Recherche</h4>
                            <div class="my-4">
                                <form  action="http://localhost/EcommercePhp/Admin/AdminComs.php" method="POST">
                                <div class="form-label-group">
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
                                            </select>
                                        </div>
                                <input class="form-control" type="submit" value="Rechercher" />
                            
                                </form>
                            
                            
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
                                    
                                    <h4>Recherche pour utilisateur : <?php echo $utilisateur ?></h4>
                                    <div class="row">
                                    <div class="col-lg-10 col-sm-6 mb-4" >
                                    <?php
                                        if(isset($_GET['message'])){
                                             if($_GET['message']=='faux'){
                                                echo '<script type="text/javascript">window.alert("Aucune case cochée !");</script>';;}
                                             if($_GET['message']=='vrai'){
                                                 echo "<p style='color:green'>Suppression reussie</p>";}
                                             if($_GET['message']=='vrai_rep'){
                                                 echo "<p style='color:green'>Reponse envoyee</p>";}
                                             if($_GET['message']=='faux_rep'){
                                                 echo "<p style='color:red'>Echec de l'envoie de la reponse </p>";}
                                             if($_GET['message']=='faux_vide'){
                                                 echo "<p style='color:red'>Reponse vide !</p>";}
                                             }
                                             ?>
                                    </div>
                                <!---<form action="http://localhost/EcommercePhp/Client/checkupComs.php?value=rep" method="POST">--->
    
                                       <?php
                                        while ($donnee = $articles->fetch()){   
                                    
                                                ?>
                                                      <div class="col-lg-10 col-sm-6 mb-4">
                                                        <form id="item" action="http://localhost/EcommercePhp/Client/checkupComs.php?value=supp" method="POST">
                                                        
                                                            <div class="card">
                                                                
                                                                <p class="card-text"><input form="item" type="checkbox" name="checkbox[]" value='<?php echo $donnee['id_com']."_";?>'> Email : <?php echo $donnee['email'];?></p>
                                                                <p class="card-text">Commentaire :</p>
                                                                <p class="card-text"><?php echo $donnee['commentaire'];?></p>
                                                                
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
                                                        <input form="item" class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type ="submit" value ="Répondre" formaction="http://localhost/EcommercePhp/Admin/ReponseCom.php" />
                                                          </form>
                                                      </div>
                                                <?php 
                                        } ?>
                                     </form>
                                                
                            </div>
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
