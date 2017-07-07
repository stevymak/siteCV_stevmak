<?php

$hote="localhost"; // le chemin vers le serveur
$bdd="sitecv_stevmak"; // le nom de la base de données
$utilisateur="root"; // le nom d'utilisateur pour se connecter
$passe=""; // mot de passe de l'utilisateur

$pdocv= new PDO('mysql:host='.$hote.';dbname='.$bdd, $utilisateur, $passe);
//$pdocv est le nom de la variable de la connexion qui sert partout ou l'on doit se servir de cette connexion
$pdocv->exec("SET NAMES utf8");

?>
