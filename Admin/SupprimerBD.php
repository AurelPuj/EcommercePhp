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
 ?>
     <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";
$connect = mysqli_connect($servername, $username, $password, $dbname);
if (!$connect) {
    echo "Echec de Connection : " . mysqli_connect_error();
}else{
    if (isset($_POST['checkbox']) && is_array($_POST['checkbox'])){
        foreach ($_POST['checkbox'] as $checkbox){
           $tabcheckbox= explode("_",$checkbox);
           foreach ($tabcheckbox as $value){
               $req="DELETE from article WHERE Ref='$value'";
               $erase= mysqli_query($connect, $req);
               if($erase==FALSE){
                   echo "c la esse";
               }
               header('Location: Liste.php?message=vrai'); 
           }
        }
    }else{
        echo '<script type="text/javascript">window.alert("Impossible de supprimer cet article !");</script>';
    }
}