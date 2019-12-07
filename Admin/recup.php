<?php
    session_start();
    if(!isset($_SESSION['type']) || $_SESSION['type'] != 'Manager'){
        header('Location: http://localhost/EcommercePhp/Client/index.php');
    }
    
    // Vérification de la duree de la session
    if (!isset($_SESSION['timeout_idle'])) {
        $_SESSION['timeout_idle'] = time() + 2*24*60;
    } 
    else {
        if ($_SESSION['timeout_idle'] < time()) {
        } 
        else {
            $_SESSION['timeout_idle'] = time() + 2*24*60;
        }
    }
 

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

    $value = $_POST['NomProduit'];
    $sql="DELETE from article WHERE Nom='$value'";
    $result = mysqli_query($connect, $sql) or die ('Erreur SQL !'.$sql.'<br />'. mysqli_error($connect));

    $sql = 'INSERT INTO article VALUES("0","'.$Nom.'","'.$Image.'","'.$Description.'","'.$Quantité.'","'.$Marque.'","'.$Catégorie.'","'.$Prix.'","'.$TVA.'")';
    mysqli_query($connect, $sql) or die ('Erreur SQL !'.$sql.'<br />'. mysqli_error($connect));
    header('Location: index.html'); 