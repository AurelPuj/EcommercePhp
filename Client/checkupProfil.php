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
if($_GET['value']=='pass'){
    if(isset($_POST["inputOldPassword"]) && isset($_POST["inputNewPassword"]) && isset($_POST["inputR_NewPassword"])){
        $inputOldPassword = mysqli_real_escape_string($connect,$_POST["inputOldPassword"]);
        $inputNewPassword = mysqli_real_escape_string($connect,$_POST["inputNewPassword"]);
        $inputR_NewPassword = mysqli_real_escape_string($connect,$_POST["inputR_NewPassword"]);
        $email = $_SESSION['email'];
        $sql = "SELECT password FROM compte WHERE email='$email'";
	$result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) >0) {
            $row = mysqli_fetch_assoc($result);
        }
        if($_POST['inputOldPassword'] != $row['password']){
            header("location:ProfilUtilisateur.php?message=Pass_faux");
        }elseif(!preg_match("#^[A-Z]([A-Za-z0-9]){6,}[a-z]$#", $inputNewPassword)){
                header("location:ProfilUtilisateur.php?message=Pass_invalide");
            }elseif($inputNewPassword != $inputR_NewPassword) {
                header("location:ProfilUtilisateur.php?message=Match_invalide");
            } else{
                $sql = "UPDATE compte SET password='$inputNewPassword' WHERE email ='$email'";
                if (mysqli_query($connect, $sql)) {
                    header("location:ProfilUtilisateur.php?message=vrai");
                } else {
                    header("location:ProfilUtilisateur.php?message=faux");

                 }
                }
        
    }
}

if($_GET['value']=='modifier'){
        //if(isset($_POST["inputNom"]) && isset($_POST["inputPrenom"]) && isset($_POST["inputNumero"]) && isset($_POST["inputZip"]) && isset($_POST["inputAdresse"]) && isset($_POST["inputEmail"]) ){
        $inputNom = mysqli_real_escape_string($connect,$_POST["inputNom"]);
	$inputPrenom = mysqli_real_escape_string($connect, $_POST["inputPrenom"]);
        $inputNumero = mysqli_real_escape_string($connect, $_POST["inputNumero"]);
        $inputZip = mysqli_real_escape_string($connect, $_POST["inputZip"]);
        $inputAdresse = mysqli_real_escape_string($connect, $_POST["inputAdresse"]);
        //$inputPassword = mysqli_real_escape_string($connect, $_POST["inputPassword"]);
        //$inputR_Password = mysqli_real_escape_string($connect, $_POST["inputR_Password"]);
        //$inputEmail = mysqli_real_escape_string($connect, $_POST["inputEmail"]);
        $inputSexe = mysqli_real_escape_string($connect, $_POST["inputSexe"]);
        $inputSituation = mysqli_real_escape_string($connect, $_POST["inputSituation"]);
        $inputDate_naissance = mysqli_real_escape_string($connect, $_POST["inputDate_naissance"]);
        $email = $_SESSION['email'];
        
        if(preg_match("[0-9.]", $inputNom) || preg_match("[0-9.]", $inputPrenom)){
            header("location:ProfilUtilisateur.php?message=NP_invalide");
        }elseif(!preg_match("#^0[1-9]([-.]?[0-9]{2}){4}$#", $inputNumero)){
            header("location:ProfilUtilisateur.php?message=Num_invalide");
        }elseif(!preg_match("#([0-9]){5}$#", $inputZip)){
            header("location:ProfilUtilisateur.php?message=Zip_invalide");
        }else{
            $sql = "UPDATE compte SET numero='$inputNumero', nom='$inputNom', prenom='$inputPrenom', zip='$inputZip', Adresse='$inputAdresse',sexe='$inputSexe',situation='$inputSituation', date_naissance='$inputDate_naissance' WHERE email ='$email'";
            if (mysqli_query($connect, $sql)) {
            header("location:ProfilUtilisateur.php?message=vrai");
	} else {
            header("location:ProfilUtilisateur.php?message=faux");

        }
        }
}
