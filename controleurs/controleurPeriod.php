<?php 

$nomComm = rand(5,20);
$a = array(3,4,6);
$key = array_rand($a);
$dur = $a[$key];
$nomServ= rand(3, 5);
$service = array('resturation', 'signalement', 'union_civil', 'election', 'etat_civil', 'scolaire');

shuffle($service);
$selectedServices = array_slice($service, 0, $nomServ);
$selectedServices = implode(', ', $selectedServices);

if(isset($_POST['Generer'])) {
    $nomdep = $_POST['dep'];
    if($nomdep != "") {
        	$verification = getDep($connexion, $nomdep);
        	if($verification == FALSE || count($verification) == 0) {
        		$message = "Le Departement n'existe pas";
        	}
        	else {
        	    $listComm = getCommCond($connexion, $nomComm, $nomdep);
        	}
    }
    else {
        $listComm = getComm($connexion, $nomComm);
    }
    $mois = $_POST['mois'];
    if($mois != "") {
        if ($dur * $nomComm > $mois) {
            $nomRange = (int)($mois / $dur);
            $realList = array_slice($listComm, 0 ,3);
        }
        else {
            $realList = $listComm;
        }
    }
    else {
        $realList = $listComm;
    }

    //saisir dans le base de donne
    foreach($realList as $comm) {
        $taille = countInstances($connexion, 'periode');
        $insertPeriode = addPeriod($connexion, $taille + 1, $comm['Idc'], $dur, $selectedServices);
        if ($insertPeriode == TRUE) {
            $message = "reussi";
        }
        else {
            $message = "problem avec saisir dans le base de donne";
        }
    }


}
?>
