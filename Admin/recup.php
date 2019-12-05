<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";
$connect = mysqli_connect($servername, $username, $password, $dbname);
if($connect ==False){
    echo 'probleme';
}else{
    $NomProduit=$_POST['NomProduit'];
    $Url=$_POST['Url'];
    $Description=$_POST['Description'];
    $req= mysqli_query($connect, "INSERT INTO article (Ref,Nom,Image,Description) VALUES (0,'$NomProduit','$Url','$Description')");
    if (!$req){
        echo "prout";
    }else{
        header('Location: http://localhost/EcommercePhp/Admin/Liste.php'); 
    }


}