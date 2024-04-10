<?php
	$connexion = connexionDB();
		
	/**
	 * Connection avec la base de données
	 */
	function connexionDB() {
		define('DB_HOST', 'localhost');
		define('DB_USER', 'root');
		//define('DB_PASSWORD', 'root');			// MAC
		define('DB_PASSWORD', '');			// Windows

		$laConnexion = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
				
		if (!$laConnexion) {
			// La connexion n'a pas fonctionné
			die('Erreur de connexion à la base de données. ' . mysqli_connect_error());
		}
		
		$db = mysqli_select_db($laConnexion, 'projet-web-2');

		if (!$db) {
			die ('La base de données n\'existe pas.');
		}
		
		mysqli_query($laConnexion, 'SET NAMES "utf8"');
		return $laConnexion;
	}


    /**
	 * Exécute la requête SQL
	 * Si le paramètre $insert est true, retourne l'id de la ressource ajoutée à la db
	 */
	function executeRequete($requete, $insert = false) {
		global $connexion;
		if ($insert) {
			mysqli_query($connexion, $requete);
			return $connexion->insert_id;
		} else {
			$resultats = mysqli_query($connexion, $requete);
			return $resultats;
		}
	}


	/**
	 * Retourne le detail d'une tache reçue en paramètre
	 */
	function getModeles($id) {
        global $connexion;
        $marqueId = mysqli_real_escape_string($connexion, $id);
        
		return executeRequete("SELECT * FROM modeles WHERE marque_id = " . $marqueId);
	}

    /**
	 * Retourne la recherche d'une voiture
	 */
    function rechercheVoitures($propriete) {
		
		return executeRequete("SELECT voitures.id,
                                voitures.prix_vente,
                                marques.nom AS marque_nom,
                                modeles.nom AS modele_nom,
                                annees.annee AS annee_valor,
                                carburants.nom AS carburant_nom,
                                transmissions.nom AS transmission_nom,
                                photos.nom AS photo_nom
                                FROM voitures 
                                JOIN marques ON voitures.marque_id = marques.id
                                JOIN modeles ON voitures.modele_id = modeles.id
                                JOIN annees ON voitures.annee_id = annees.id
                                JOIN carburants ON voitures.carburant_id = carburants.id
                                JOIN transmissions ON voitures.transmission_id = transmissions.id
                                LEFT JOIN photos ON voitures.id = photos.voiture_id
                                WHERE CONCAT(
                                marques.nom, 
                                ' ', 
                                modeles.nom, 
                                ' ', 
                                annees.annee
                            ) LIKE  '%$propriete%'");    
        
	}




	
?>