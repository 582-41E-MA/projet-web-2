<?php
	// Pour accéder à la base de données
	require_once('fonctionsDB.php');
	
	if (isset($_GET['marqueId'])) {

		$modeles = getModeles($_GET['marqueId']);

        while ($modele = mysqli_fetch_assoc($modeles)) { 		// mysqli_fetch_assoc => récupére les résultats sous forme de tableau associatif
			$data[] = $modele;
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($data);								// json_encode => retourne la représentation JSON d'une valeur	
	} else {
		echo 'Erreur query string';
	}
?>