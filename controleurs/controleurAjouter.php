<?php 

//compte le nombre d'instance des tables Enfant Commune et Ecole
$t1=countInstances($connexion,"enfant");
$t2=countInstances($connexion,"commune");
$t3=countInstances($connexion,"ecole_");
//recupere les enfant et leur ecole dans la bd
$enfant = Enfantecole($connexion);
//recupere les enfant et la cantine ou il mangeront le 01/01/2024
$cantine =Enfantcantine($connexion);
//recupere les enfant ayant le meme nom et prenom mais allant dans des ecoles differente
$paireenfant=paireenfant($connexion);
//recupere le top 3 departements avec le plus de communes
$Top3commune=Top3commune($connexion);

?>

