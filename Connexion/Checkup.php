<?php
session_start();
$_SESSION['login'] = $_SESSION['login'] . " " . $_POST['inputEmail'] . " ";
$_POST['inputEmail'] = $_POST['inputEmail'];
$_SESSION['password'] = $_SESSION['password'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";
$connect = mysqli_connect($servername, $username, $password, $dbname);
if (!$connect) {
    echo "Echec de Connection : " . mysqli_connect_error();
}/*
    if(isset($_GET['value'])=='connexion' && isset($_POST["inputEmail"])){
        $try = $_POST['inputEmail'];
        echo "c est $try";
        //$idm = mysqli_real_escape_string($connect,$_POST["inputEmail"]);
        $sql = "SELECT password FROM compte WHERE email='$try'";
	$result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) >0) {
            $row = mysqli_fetch_assoc($result);
            echo $row['password'];
        }
        if($_POST['inputPassword'] == $row['password']){
            header("location:http://localhost/EcommercePhp/Admin/index.html");      
        } else{
            header("location:log.php?message=faux");
        }
    }*/
    echo 'try1';
    if(isset($_GET['value'])=='inscription'){
        echo 'try2';
        if(isset($_POST["inputNom"]) && isset($_POST["inputPrenom"]) && isset($_POST["inputNumero"]) && isset($_POST["inputZip"]) && isset($_POST["inputAdresse"]) && isset($_POST["inputEmail"]) && isset($_POST["inputPassword"]) )
{	echo 'lol';
        $inputNom = mysqli_real_escape_string($connect,$_POST["inputNom"]);
	$inputPrenom = mysqli_real_escape_string($connect, $_POST["inputPrenom"]);
	$inputNumero = mysqli_real_escape_string($connect, $_POST["inputNumero"]);
        $inputZip = mysqli_real_escape_string($connect, $_POST["inputZip"]);
        $inputAdresse = mysqli_real_escape_string($connect, $_POST["inputAdresse"]);
        $inputEmail = mysqli_real_escape_string($connect, $_POST["inputEmail"]);
        $inputPassword = mysqli_real_escape_string($connect, $_POST["inputPassword"]);
	$sql = "INSERT INTO compte (nom, prenom, numero, zip, adresse, email, password)
	VALUES ('$inputNom', '$inputPrenom', '$inputNumero', '$inputZip', '$inputAdresse', '$inputEmail', '$inputPassword')";
        echo'lol2';
    //exécuter la requête d'insertion
	if (mysqli_query($conn, $sql)) {
    	echo "Succès";
        header("location:log.php?message=faux");
	} else {
    	echo "Erreur d'insertion !! " ;
        header("location:log.php?message=faux");

        }
        }
}