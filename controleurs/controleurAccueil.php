<!--
ce fichier est vide, il faudra y mettre du code pour que la page d'accueil soit en MVC
-->

<?php

// $nb = countInstances($connexion, "enfant");
// 	if($nb <= 0)
// 		$message = "Aucune enfant n'a été trouvée dans la base de données !";
// 	else
// 		$message = "<mark>Connecté à la base de données.</mark> : actuellement <strong>$nb enfants</strong> dans la base.";
//

if(isset($_POST['boutonValider'])) { // formulaire soumis

    $comm = integrer($connexion, 'communes');
    if($comm == null || count($comm) == 0) {
        $message = "Aucune commune n'a été trouvée dans la base de données !";
    }
    else {
        //$affiche = "";
        foreach($comm as $c) {
            $nom_reg = $c['code_region'];
            if ($nom_reg == 84) {  //verifier si le region est auvergne rhone alps

                $existsReg = exists($connexion, 'region', 'Code_INSEE', 'Code_INSEE', 84);
                //creer auvergne s'il existe
                if($existsReg == null || count($existsReg) == 0) {
                      $insertDep = addRegion($connexion, $c['code_region'], $c['nom_region']);
                      if ($insertDep == TRUE) {
                          $message = "entered Auvergne-Rhône-Alpes";
                      }
                      else {
                          $message = "problem avec Auvergne-Rhône-Alpes";
                      }
                }

                $codeDep = $c['code_departement'];
                $existsDep = exists($connexion, 'department_', 'code_INSEE', 'code_INSEE', $codeDep);
                if($existsDep == null || count($existsDep) == 0) {
                      $insertDep = addDep($connexion, $c['nom_departement'], $codeDep, $c['code_region'], $c['nom_region']);
                      if ($insertDep == TRUE) {
                          $message = 'entered department';
                      }
                      else {
                          $message = "problem avec departement";
                      }
                }

                $codeComm = $c['code_commune_INSEE'];
                $existsComm = exists($connexion, 'commune', 'Idc', 'Idc', $codeComm);
                if($existsComm == null || count($existsComm) == 0) {
                      $insertComm = addComm($connexion, $codeComm, $c['code_postal'], $c['nom_commune_complet'], $c['latitude'], $c['longitude'], $c['nom_departement'], $codeDep);
                      if ($insertComm == TRUE) {
                          $message = 'entered department';
                      }
                      else {
                          $message = "problem avec departement";
                      }
                }
            }
        }
    }
}
?>





