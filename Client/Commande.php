<?php
            session_start();
            $_SESSION['type'] = $_SESSION['type'];
            $_SESSION['email']= $_SESSION['email'];
            $_SESSION['id']=$_SESSION['id'];
            $_SESSION['timeout_idle'] = time() + 2*24*60;


            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ecommerce";
            $connect = mysqli_connect($servername, $username, $password, $dbname);
            
            if (!$connect) {
                echo "Echec de Connection : " . mysqli_connect_error();
            }
            
            if(isset ($_POST['QuantitéAchat'])){
                $sql = 'INSERT INTO commande VALUES("0","'.$_POST['Nom'].'","'.$_POST['Image'].'","'.$_POST['Prix'].'","'.$_POST['QuantitéAchat'].'","'.'0'.'","'.$_SESSION['email'].'")';
                mysqli_query($connect, $sql) or die ('Erreur SQL !'.$sql.'<br />'. mysqli_error($connect));
            }
            
            if (isset($_POST['checkbox']) && is_array($_POST['checkbox'])){
                foreach ($_POST['checkbox'] as $checkbox){
                    $tabcheckbox= explode("_",$checkbox);
                    foreach ($tabcheckbox as $value){
                        $req="DELETE from commande WHERE NumCommande='$value'";
                        $erase= mysqli_query($connect, $req);
                        if($erase==FALSE){
                            echo "c la esse";
                        }
                    }   
            }   
            }
            if (isset($_POST['boutton']) && $_POST['boutton']== 'Payer'){
                if (isset($_POST['NomAchat']) && is_array($_POST['NomAchat'])){
                foreach ($_POST['NomAchat'] as $Panier){
                    $tabPanier= explode("_",$Panier);
                    foreach ($tabPanier as $value){
                        $req="SELECT Quantite FROM article WHERE Nom='$value'";
                        $recup=mysqli_query($connect, $req) or die ('Erreur SQL !'.$req.'<br />'. mysqli_error($connect));
                        $req="SELECT QuantiteAchat FROM commande WHERE Nom='$value'";
                        $recupachat=mysqli_query($connect, $req) or die ('Erreur SQL !'.$req.'<br />'. mysqli_error($connect));
                        
                        if (mysqli_num_rows($recup) >0 && mysqli_num_rows($recupachat) >0) {
                            $row = mysqli_fetch_assoc($recup);
                            $row1 = mysqli_fetch_assoc($recupachat);

                        }
                        $achat=intval($row['Quantite'])-intval($row1['QuantiteAchat']);
                        echo $row['Quantite'],$row1['QuantiteAchat'];
                        $req="UPDATE article SET Quantite=".$achat." WHERE Nom='$value'";
                        $udapte= mysqli_query($connect, $req) or die ('Erreur SQL !'.$req.'<br />'. mysqli_error($connect));
                        $req="DELETE from commande WHERE Nom='$value'";
                        $erase= mysqli_query($connect, $req);
                    }   
            }}}   
            
?>

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
                  <a class="nav-link" href="http://localhost/EcommercePhp/Client/index.php">Acceuil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="http://localhost/EcommercePhp/Client/GestionCommande">Rechercher</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="http://localhost/EcommercePhp/Client/Commande">Pannier</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
         
         <section class="py-5">
                <!-- Page Content -->
                <div class="container">

                  <!-- Page Heading -->
                  <h1 class="my-4">Panier</h1>
                    <form action="" method="POST" >
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
                              $email=$_SESSION['email'];
                              $articles= $bdd->query("SELECT NumCommande,Nom,Image,PrixAchat,QuantiteAchat  FROM commande WHERE Etat=0 and EmailClient='".$email."' ");?>
                            
                              <?php
                                $count=0;
                                while ($donnee = $articles->fetch()){
                                    if ($donnee['Quantite']>0){?>
                                      <div class="col-lg-4 col-sm-6 mb-4 ">
                                        <div class="card h-100">
                                          <img class="card-img-top" src="<?php echo $donnee['Image'];?>" alt="">
                                          <div class="card-body ">
                                            <h4 class="card-title">
                                                <input type="checkbox" name="checkbox[]" value='<?php echo$donnee['NumCommande']."_";?>'>
                                                <a href="#"><?php echo $donnee['Nom'];?></a>
                                            </h4>
                                            <p class="card-text">Prix : <?php echo $donnee['PrixAchat'];?></p>
                                            <p class="card-text">Quantité : <?php echo $donnee['QuantiteAchat'];?></p>
                                            <input type="hidden" name="NomAchat[]" Value='<?php echo $donnee['Nom']."_";?>'>
                                          </div>
                                        </div>
                                      </div>
                                    <?php }
                                $count=$count+1;
                                }
                                if ($count==0){
                                  header('Location: GestionCommande.php?message=vide'); 
  
                                }?>
                        </div>
                        
                        <input type="submit" name="boutton" value="Payer">
                        <input type="submit" name="boutton" value="Supprimer">
                    </form>
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