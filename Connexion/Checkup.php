<?php
session_start();
$_SESSION['type'] = $_POST['inputType'];
$_SESSION['email']=  $_POST['inputEmail'];
$_SESSION['timeout_idle'] = time() + 2*24*60;
   

setcookie('email',$_POST['inputEmail'], time() + 365*24*3600, null, null, false, true); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";
$connect = mysqli_connect($servername, $username, $password, $dbname);
if (!$connect) {
    echo "Echec de Connection : " . mysqli_connect_error();
}
    if($_GET['value']=='connexion' && isset($_POST["inputEmail"])){
        $inputEmail = $_POST['inputEmail'];
        $inputType = $_POST['inputType'];
        $sql = "SELECT password, type FROM compte WHERE email='$inputEmail'";
	$result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) >0) {
            $row = mysqli_fetch_assoc($result);
        }
        if($_POST['inputPassword'] == $row['password'])
        {
            if($_POST['inputType'] == $row['type'] && $row['type'] == 'Client'){
                header("location:http://localhost/EcommercePhp/Client/index.php");
            }elseif($_POST['inputType'] == $row['type'] && $row['type'] == 'Manager'){
                header("location:http://localhost/EcommercePhp/Admin/Liste.php");//
            }else {
            header("location:log.php?message=faux");
            }
        }else {
            header("location:log.php?message=error_password");
        }
    }
    if($_GET['value']=='inscription'){
        if(isset($_POST["inputNom"]) && isset($_POST["inputPrenom"]) && isset($_POST["inputNumero"]) && isset($_POST["inputZip"]) && isset($_POST["inputAdresse"]) && isset($_POST["inputEmail"]) && isset($_POST["inputR_Password"]) && isset($_POST["inputPassword"]) ){
        $inputNom = mysqli_real_escape_string($connect,$_POST["inputNom"]);
	$inputPrenom = mysqli_real_escape_string($connect, $_POST["inputPrenom"]);
        $inputNumero = mysqli_real_escape_string($connect, $_POST["inputNumero"]);
        $inputZip = mysqli_real_escape_string($connect, $_POST["inputZip"]);
        $inputAdresse = mysqli_real_escape_string($connect, $_POST["inputAdresse"]);
        $inputPassword = mysqli_real_escape_string($connect, $_POST["inputPassword"]);
        $inputR_Password = mysqli_real_escape_string($connect, $_POST["inputR_Password"]);
        $inputEmail = mysqli_real_escape_string($connect, $_POST["inputEmail"]);
        $inputSexe = mysqli_real_escape_string($connect, $_POST["inputSexe"]);
        $inputSituation = mysqli_real_escape_string($connect, $_POST["inputSituation"]);
        $inputDate_naissance = mysqli_real_escape_string($connect, $_POST["inputDate_naissance"]);
        
        if(preg_match("[0-9.]", $inputNom) || preg_match("[0-9.]", $inputPrenom)){
            header("location:nouvelUtilisateur.php?message=NP_invalide");
        }
        if(!preg_match("#^0[1-9]([-.]?[0-9]{2}){4}$#", $inputNumero)){
            header("location:nouvelUtilisateur.php?message=Num_invalide");
        }
        if(!preg_match("#([0-9]){5}$#", $inputZip)){
            header("location:nouvelUtilisateur.php?message=Zip_invalide");
        }
        if(!preg_match("#^[A-Z]([A-Za-z0-9]){6,}[a-z]$#", $inputPassword)){
            header("location:nouvelUtilisateur.php?message=Pass_invalide");
        }
        if($inputR_Password != $inputPassword){
            header("location:nouvelUtilisateur.php?message=Match_invalide");
        }
        
        $sql = "SELECT email FROM compte WHERE email='$inputEmail'";
	$result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) >0) {
            $row = mysqli_fetch_assoc($result);
            echo $row['email'];
        }
        if($_POST['inputEmail'] == $row['email']){
            header("location:nouvelUtilisateur.php?message=User_existant");      
        } else {
            	$sql = "INSERT INTO compte (type, nom, prenom, numero, zip, adresse, password, email, sexe, situation, date_naissance)
	VALUES ('Client', '$inputNom', '$inputPrenom', '$inputNumero', '$inputZip', '$inputAdresse', '$inputPassword', '$inputEmail', '$inputSexe', '$inputSituation' , '$inputDate_naissance')";
                        //exécuter la requête d'insertion
	if (mysqli_query($connect, $sql)) {
            header("location:nouvelUtilisateur.php?message=vrai");
	} else {
            header("location:nouvelUtilisateur.php?message=faux");

        }
        }
        }
        }