<?php

$res = getCommunes ($connexion);

	// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $Libellé = $_POST["service"];
    $Desicription = $_POST["description"];
    $Periode_d_ouverture = $_POST["dated"];
    $dateFin = $_POST["datef"];
    $Gratuit_Payant = $_POST["choix"];
    $Idc = $_POST["idc"];
    $Code_INSEE = $_POST["codeInsee"];

    if ($Gratuit_Payant == "Payant") {
        $Gratuit_Payant = 0;
    }
    else {
        $Gratuit_Payant = 1;
    }

    $sql = insertService($connexion, $Libellé, $Desicription, $Periode_d_ouverture, $dateFin, $Gratuit_Payant, $Idc, $Code_INSEE);
    // Exécuter la requête SQL
    if ($sql === TRUE) {
        echo "Enregistrement ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout de l'enregistrement : ";
    }
}
?>
