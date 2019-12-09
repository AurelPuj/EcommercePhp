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
if($_GET['value'] == 'search'){
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
}

if($_GET['value'] == 'supp'){
    if (isset($_POST['checkbox']) && is_array($_POST['checkbox'])){
        foreach ($_POST['checkbox'] as $checkbox){
           $tabcheckbox= explode("_",$checkbox);
           foreach ($tabcheckbox as $del){
               $req="DELETE FROM commentaire WHERE id_com='$del'";
               $erase= mysqli_query($connect, $req);
               if($erase==FALSE){
                   header('Location: http://localhost/EcommercePhp/Admin/AdminComs.php?message=faux');
               }else{
                   header('Location: http://localhost/EcommercePhp/Admin/AdminComs.php?message=vrai'); 
               }
           }
        }
    }else{
        header('Location: http://localhost/EcommercePhp/Admin/AdminComs.php?message=faux');
    }
}
