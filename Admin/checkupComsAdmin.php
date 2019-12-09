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
if($_GET['value'] != 'rep'){
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
        
    }
}elseif ($_GET['value'] == 'rep') {
    if(isset($_POST["reponse"])){
        $rep = mysqli_real_escape_string($connect,$_POST["reponse"]);
        $id_com = mysqli_real_escape_string($connect,$_POST["id_com"]);
        $sql = "UPDATE commentaire SET reponse='$rep' WHERE id_com = '$id_com'";
        
        if (mysqli_query($connect, $sql)) {
                    header("location:AdminComs.php?message=vrai_rep");
                } else {
                    header("location:AdminComs.php?message=faux_rep");

                 }
    } else{
        header("location:AdminComs.php?message=faux_vide");
    }
}
