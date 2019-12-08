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
    if(isset($_POST["commentaire"])){
        $commentaire = mysqli_real_escape_string($connect,$_POST["commentaire"]);
        $email = $_SESSION['email'];
        $sql = "SELECT nom, prenom FROM compte WHERE email='$email'";
	$result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) >0) {
            $row = mysqli_fetch_assoc($result);
        }
        
        $nom = $row["nom"];
        $prenom = $row["prenom"];
        $sql = "INSERT INTO commentaire (email, nom, prenom, commentaire) VALUES ('$email','$nom','$prenom','$commentaire')";
        if (mysqli_query($connect, $sql)) {
                    header("location:UserComs.php?message=vrai");
                } else {
                    header("location:UserComs.php?message=faux");

                 }
        /*if($_POST['inputOldPassword'] != $row['password']){
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
                }*/
        
    }
