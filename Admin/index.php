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
<html lang="fr">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" type="image/ico" href="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/H%26M-Logo.svg/1200px-H%26M-Logo.svg.png" />
  <title>H&M</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

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
              </ul>
            </div>
          </div>
        </nav>
     
    
    
     <section class="py-5"> 
        <div class="d-flex" id="wrapper">

          <div id="page-content-wrapper">

              <p align="center"><img class="img-fluid" src="https://s2.best-wallpaper.net/wallpaper/3840x2160/1807/Hanger-clothing_3840x2160.jpg" alt=""></p>
              <a href="http://localhost/EcommercePhp/Admin/Ajouter.php" class="list-group-item list-group-item-action bg-light">Ajouter</a>
              <a href="http://localhost/EcommercePhp/Admin/Supprimer.php" class="list-group-item list-group-item-action bg-light">Supprimer</a>
              <a href="Liste.php" class="list-group-item list-group-item-action bg-light" >Gérer Stocks</a>
              
          <!-- /#page-content-wrapper -->

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
