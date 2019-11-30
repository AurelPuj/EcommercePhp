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
}
    if(isset($_POST["inputEmail"])){
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
    }
/*
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ecommerce;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
echo $_POST['inputEmail'];

// On prépare la requête  avec l'argument :pseudo
$query = $bdd->prepare("SELECT COUNT(*) FROM compte WHERE Id=:pseudo");
// On exécute la requête en remplaçant :pseudo par $pseudo
$query->execute(array("pseudo" => $_POST['inputEmail']));
// On récupère le nombre COUNT(*)
$count = $query->fetchColumn();
if ($count == 1){
     echo "Le pseudo existe";
}else{
     echo "Le pseudo existe pas";
}*/