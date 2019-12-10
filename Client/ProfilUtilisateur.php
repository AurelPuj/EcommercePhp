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
    $mail = $_SESSION['email'];
    $sql = "SELECT type, nom, prenom, numero, zip, adresse, password, email, sexe, situation, date_naissance FROM compte WHERE email='$mail'";
    $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) >0) {
            $row = mysqli_fetch_assoc($result);
        }
        $type = $row['type'];
        $nom = $row['nom'];
        $prenom = $row['prenom'];
        $numero = $row['numero'];
        $zip = $row['zip'];
        $adresse = $row['adresse'];
        $email = $row['email'];
        $sexe = $row['sexe'];
        $situation = $row['situation'];
        $date_naissance = $row['date_naissance'];
        
        
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
                        
                        <li class="nav-item">
                          <a class="nav-link" href="http://localhost/EcommercePhp/Client/ProfilUtilisateur.php">Profil</a>
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
                         <h3 class="login-heading mb-4">Mot de passe</h3>
                         <form action="http://localhost/EcommercePhp/Client/checkupProfil.php?value=pass" method="POST" >
                             <div class="form-label-group">
                                <label for="inputOldPassword">Ancien Mot de passe</label>
                                <input type="password" name="inputOldPassword" id="inputOldPassword" class="form-control" placeholder="Ancien Mot de passe" required autofocus>
                             </div>
                             
                             <div class="form-label-group">
                                <label for="inputNewPassword">Nouveau Mot de passe</label>
                                <input type="password" name="inputNewPassword" id="inputNewPassword" class="form-control" placeholder="Nouveau Mot de passe" required autofocus>
                             </div>
                             
                             <div class="form-label-group">
                                <label for="inputR_NewPassword">Nouveau Mot de passe</label>
                                <input type="password" name="inputR_NewPassword" id="inputR_NewPassword" class="form-control" placeholder="Nouveau Mot de passe" required autofocus>
                             </div>
                             
                             <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Enregistrer</button>
                         </form>
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
                    <h3 class="login-heading mb-4">Profil</h3>
                    <form action="http://localhost/EcommercePhp/Client/checkupProfil.php?value=modifier" method="POST" >
                      <div class="form-label-group">
                         <label for="inputNom">Nom</label>
                        <input type="text" name="inputNom" id="inputNom" class="form-control" value="<?php echo $nom; ?>" required autofocus>
                      </div>
                        
                      <div class="form-label-group">
                        <label for="inputPrenom">Prenom</label>
                        <input type="text" name="inputPrenom" id="inputPrenom" class="form-control" value="<?php echo $prenom; ?>" required autofocus>
                      </div>
                        
                      <div class="form-label-group">
                        <label for="inputNumero">Numero de téléphone</label>
                        <input type="int" name="inputNumero" id="inputNumero" class="form-control" value="<?php echo $numero; ?>" required  autofocus>
                      </div>
                        
                       <div class="form-label-group">
                        <label for="inputSexe">Sexe </label>
                        <select name=inputSexe id="inputSexe" class="form-control">
                               <option value="">Choisir...</option>
                               <option value="Masculin">Masculin</option>
                               <option value="Feminin">Feminin</option>
                               <option value="Autre">Autre</option>
                               <?php
                               switch ($sexe) {
                                   case "Masculin":
                                       ?>
                                       <option selected value="Masculin">Masculin</option>
                                       <?php
                                       break;
                                   case "Feminin":
                                       ?>
                                       <option selected value="Feminin">Feminin</option>
                                       <?php
                                       break;
                                   case "Autre":
                                       ?>
                                       <option selected value="Autre">Autre</option>
                                       <?php
                                       break;
                                   default:
                                       ?>
                                       <option selected <option value="">Choisir...</option>
                                       <?php
                                       break;
                               }
                               ?>
                           </select>
                      </div>
                        
                      <div class="form-label-group">
                           <label for="inputSituation">Situation </label>
                           <select name=inputSituation id="inputSituation" class="form-control">
                               <option value="">Choisir...</option>
                               <option value="M">Marié</option>
                               <option value="P">Pacsé</option>
                               <option value="D">Divorcé</option>
                               <option value="S">Séparé</option>
                               <option value="C">Célibataire</option>
                               <option value="V">Veuf</option>
                               <?php
                               switch ($situation) {
                                   case "M":
                                       ?>
                                       <option selected value="M">Marié</option>
                                       <?php
                                       break;
                                   case "P":
                                       ?>
                                       <option selected value="P">Pacsé</option>
                                       <?php
                                       break;
                                   case "D":
                                       ?>
                                       <option selected value="D">Divorcé</option>
                                       <?php
                                       break;
                                   case "S":
                                       ?>
                                       <option selected value="S">Séparé</option>
                                       <?php
                                       break;
                                   case "C":
                                       ?>
                                       <option selected value="C">Célibataire</option>
                                       <?php
                                       break;
                                   case "V":
                                       ?>
                                       <option selected value="V">Veuf</option>
                                       <?php
                                       break;
                                   default:
                                       ?>
                                       <option selected value="">Choisir...</option>
                                       <?php
                                       break;
                               }
                               ?>
                           </select>
                       </div>
                        
                       <div class="form-label-group">
                        <label for="inputDate_naissance">Date de naissance </label>
                        <input type="text" name="inputDate_naissance" id="inputDate_naissance" class="form-control" value="<?php echo $date_naissance; ?>" autofocus>
                      </div>
                        
                      <div class="form-label-group">
                        <label for="inputZip">ZiP Code</label>
                        <input type="text" name="inputZip" id="inputZip" class="form-control" value="<?php echo $zip; ?>" required autofocus>
                      </div>
                        
                       <div class="form-label-group">
                         <label for="inputAdresse">Adresse</label>
                         <input type="text" name="inputAdresse" id="inputAdresse" class="form-control" value="<?php echo $adresse; ?>" required autofocus>
                       </div>
                        
                      <div class="form-label-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" name="inputEmail" id="inputEmail" class="form-control" value="<?php echo $email; ?>" required autofocus>
                      </div>
                        
                      <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Enregistrer</button>
                      <a href="http://localhost/EcommercePhp/Client/index.php" class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="button">Annuler</a>
                    </form>
                    <?php
                    if(isset($_GET['message'])){
                        if($_GET['message']=='faux'){
                            echo "<p style='color:red'>Erreur de connexion</p>";}
                        if($_GET['message']== 'vrai'){
                            echo "<p style='color:green'>Modification validée</p>";}
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
                        if($_GET['message']== 'Pass_faux'){
                            echo "<p style='color:red'>Password faux ! </p>";}
                    }
                        ?>
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