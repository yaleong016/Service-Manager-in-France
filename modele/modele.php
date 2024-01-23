<?php

// connexion à la BD, retourne un lien de connexion
function getConnexionBD() {
	$connexion = mysqli_connect(SERVEUR, UTILISATRICE, MOTDEPASSE, BDD);
	if (mysqli_connect_errno()) {
	    printf("Échec de la connexion : %s\n", mysqli_connect_error());
	    exit();
	}
	mysqli_query($connexion,'SET NAMES UTF8'); // noms en UTF8
	return $connexion;
}

// déconnexion de la BD
function deconnectBD($connexion) {
	mysqli_close($connexion);
}

// nombre d'instances d'une table $nomTable
function countInstances($connexion, $nomTable) {
	$requete = "SELECT COUNT(*) AS nb FROM $nomTable";
	$res = mysqli_query($connexion, $requete);
	if($res != FALSE) {
		$row = mysqli_fetch_assoc($res);
		return $row['nb'];
	}
	return -1;  // valeur négative si erreur de requête (ex, $nomTable contient une valeur qui n'est pas une table)
}

// retourne les instances d'une table $nomTable
function getInstances($connexion, $nomTable) {
	$requete = "SELECT * FROM $nomTable";
	$res = mysqli_query($connexion, $requete);
	$instances = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $instances;
}

function Enfantecole($connexion){
	$requete="SELECT Nom ,Prénom, Nom FROM inscrit_ NATURAL JOIN lieu ";
	$res = mysqli_query($connexion, $requete);
	$instances = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $instances;


}

function Enfantcantine($connexion){
	$requete="SELECT Nom ,Prénom ,nom as NomCantine FROM inscription NATURAL JOIN cantine_";
	$res = mysqli_query($connexion, $requete);
	$instances = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $instances;
}

function paireenfant($connexion){
	$requete="SELECT DISTINCT A.Nom AS Nom_1,A.Prénom AS Prénom_1,A.Idl AS Idl_1,B.Nom AS Nom_2,B.Prénom AS Prénom_2,B.Idl AS Idl_2 FROM inscription A JOIN inscription B ON A.Nom = B.Nom AND A.Prénom = B.Prénom AND A.Idl <> B.Idl ORDER BY Nom_1, Prénom_1, Idl_1, Nom_2, Prénom_2, Idl_2";
	$res = mysqli_query($connexion, $requete);
	$instances = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $instances;

}

function Top3commune($connexion){
	$requete="SELECT department_.nomD AS Nom_Departement,COUNT(commune.Idc) AS Nombre_de_Communes FROM department_ JOIN commune ON department_.nomD = commune.nomD GROUP BY Nom_Departement ORDER BY Nombre_de_Communes DESC LIMIT 3";
	$res = mysqli_query($connexion, $requete);
	$instances = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $instances;
}


function getDep($connexion, $nomDep) {
	$nomDep = mysqli_real_escape_string($connexion, $nomDep); // sécurisation de $nomSerie
	$requete = "SELECT * FROM department_ WHERE nomD = '". $nomDep . "'";
	$res = mysqli_query($connexion, $requete);
	$series = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $series;
}

function exists($connexion, $nomTable, $nomColonne, $condCol, $condition) {
    $requete = "SELECT $nomColonne FROM $nomTable WHERE $condCol = $condition";
    $res = mysqli_query($connexion, $requete);
    $instances = mysqli_fetch_all($res, MYSQLI_ASSOC);
    return $instances;
}

function addRegion($connexion, $code, $nom) {
    $code = mysqli_real_escape_string($connexion, $code);
    $nom = mysqli_real_escape_string($connexion, $nom);
    $requete = "INSERT INTO region VALUES ('$code', '$nom')";
    $res = mysqli_query($connexion, $requete);
    return $res;
}
function addDep($connexion, $nomDep, $code, $code2, $nom) {
    $nomDep = mysqli_real_escape_string($connexion, $nomDep);
    $code = mysqli_real_escape_string($connexion, $code);
    $code2 = mysqli_real_escape_string($connexion, $code2);
    $nom = mysqli_real_escape_string($connexion, $nom);
    $requete = "INSERT INTO department_ VALUES ('$nomDep', '$code', '$code2', '$nom')";
    $res = mysqli_query($connexion, $requete);
    return $res;
}


function addComm($connexion, $codeComm, $codePost, $nom, $lat, $long, $nomDep, $codeDep) {
    $codeComm = mysqli_real_escape_string($connexion, $codeComm);
    $codePost = mysqli_real_escape_string($connexion, $codePost);
    $nom = mysqli_real_escape_string($connexion, $nom);
    $lat = mysqli_real_escape_string($connexion, $lat);
    $long = mysqli_real_escape_string($connexion, $long);
    $nomDep = mysqli_real_escape_string($connexion, $nomDep);
    $codeDep = mysqli_real_escape_string($connexion, $codeDep);

    $requete = "INSERT INTO commune VALUES ('$codeComm', '$codeComm', '$codePost', '$nom', ST_GeomFromText('POINT($lat $long)'), NULL, '$nomDep', '$codeDep')";

    $res = mysqli_query($connexion, $requete);
    return $res;

}


function integrer($connexion, $nomTable)  {
    $requete = "SELECT * FROM $nomTable";
    $res = mysqli_query($connexion, $requete);
    $instances = mysqli_fetch_all($res, MYSQLI_ASSOC);
    return $instances;
}
function getcomm ($connexion, $nomComm) {
    $requete = "SELECT Idc FROM commune ORDER BY RAND() LIMIT $nomComm;";
    $res = mysqli_query($connexion, $requete);
    $instances = mysqli_fetch_all($res, MYSQLI_ASSOC);
    return $instances;
}

function getCommCond ($connexion, $nomComm, $nomDep) {
    $requete = "SELECT Idc FROM commune WHERE nomD = '$nomDep' ORDER BY RAND() LIMIT $nomComm;";
    $res = mysqli_query($connexion, $requete);
    $instances = mysqli_fetch_all($res, MYSQLI_ASSOC);
    return $instances;
}


function addPeriod($connexion, $taille, $code, $dur, $services) {
    $taille = mysqli_real_escape_string($connexion, $taille);
    $code = mysqli_real_escape_string($connexion, $code);
    $dur = mysqli_real_escape_string($connexion, $dur);
    $services = mysqli_real_escape_string($connexion, $services);


    $requete = "INSERT INTO periode VALUES ('$taille', '$code', '$dur', '$services' )";

    $res = mysqli_query($connexion, $requete);
    return $res;

}



//////////////// 3rd functionality sql
function insertService ($connexion, $Libellé, $Desicription, $Periode_d_ouverture, $dateFin, $Gratuit_Payant, $Idc, $Code_INSEE) {
    $Libellé = mysqli_real_escape_string($connexion, $Libellé);
    $Desicription = mysqli_real_escape_string($connexion, $Desicription);
    $Periode_d_ouverture = mysqli_real_escape_string($connexion, $Periode_d_ouverture);
    $dateFin = mysqli_real_escape_string($connexion, $dateFin);
    $Gratuit_Payant = mysqli_real_escape_string($connexion, $Gratuit_Payant);
    $Idc = mysqli_real_escape_string($connexion, $Idc);
    $Code_INSEE = mysqli_real_escape_string($connexion, $Code_INSEE);

    $requete = "INSERT INTO service_ VALUES ('$Libellé', '$Desicription', '$Periode_d_ouverture', '$dateFin', '$Gratuit_Payant', '$Idc', '$Code_INSEE')";
    $res = mysqli_query($connexion, $requete);
    return $res;
}


////
function getCommunes ($connexion) {
     $sql = "SELECT idc, nomC, Code_INSEE FROM commune";
     $result = $connexion->query($sql);
     return $result->fetch_all(MYSQLI_ASSOC);
}
?>

