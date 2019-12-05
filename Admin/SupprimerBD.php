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
               header('Location: index.html'); 
           }
        }
    }else{
        echo 'prout';
    }
}