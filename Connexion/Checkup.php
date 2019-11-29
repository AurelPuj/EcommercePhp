<?php

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
}
