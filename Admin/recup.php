<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ecommerce;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('INSERT INTO article (Ref,Nom,Image,Description) VALUES (?,?,?,?)');
$req->execute(array(0,$_POST['NomProduit'], $_POST['Url'],$_POST['Description']));

header('Location: http://localhost/EcommercePhp/Admin/Liste.php'); 
