<?php

$Nom=$_POST['NomProduit'];
$Image=$_POST['Url'];
$Description=$_POST['Description'];
$Quantité=$_POST['Quantité'];
$Marque=$_POST['Marque'];
$Catégorie=$_POST['Catégorie'];
$Prix=$_POST['Prix'];
$TVA=$_POST['TVA'];

$connect = mysqli_connect('localhost', 'root', '', 'ecommerce');

if (!$connect) {
    echo "Echec de Connection : " . mysqli_connect_error();
}

$sql = 'INSERT INTO article VALUES("0","'.$Nom.'","'.$Image.'","'.$Description.'","'.$Quantité.'","'.$Marque.'","'.$Catégorie.'","'.$Prix.'","'.$TVA.'")';

mysqli_query($connect, $sql) or die ('Erreur SQL !'.$sql.'<br />'. mysqli_error($connect));;
