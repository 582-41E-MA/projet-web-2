<?php
    require_once('fonctionsDB.php');

    $request_payload = file_get_contents('php://input');
    $data = json_decode($request_payload, true);

    if (isset($data['action'])) {

        // Switch en fonction de l'action envoyée
        switch ($data['action']) {

            case 'rechercheVoitures':
                if (isset($data['recherche'])) {
                    $voitures = rechercheVoitures($data['recherche']); 
                
                    $data = [];
                
                    if (mysqli_num_rows($voitures) > 0) {
                        // Récupérer la ligne suivante d'un ensemble de résultats sous forme de tableau associatif
                        while ($voiture = mysqli_fetch_assoc($voitures)) { 
                            $data[] = $voiture;
                        }
                    }
                
                    header('Content-type: application/json; charset=utf-8');
                    echo json_encode($data);
                }
                
            break;

            case 'rechercheUtilisateurs':
                if (isset($data['recherche'])) {
                    $users = rechercheUtilisateurs($data['recherche']); 
                
                    $data = [];
                
                    if (mysqli_num_rows($users) > 0) {
                        // Récupérer la ligne suivante d'un ensemble de résultats sous forme de tableau associatif
                        while ($user = mysqli_fetch_assoc($users)) { 
                            $data[] = $user;
                        }
                    }
                
                    header('Content-type: application/json; charset=utf-8');
                    echo json_encode($data);
                }
                
            break;

            case 'rechercheClients':
                if (isset($data['recherche'])) {
                    $users = rechercheClients($data['recherche']); 
                
                    $data = [];
                
                    if (mysqli_num_rows($users) > 0) {
                        // Récupérer la ligne suivante d'un ensemble de résultats sous forme de tableau associatif
                        while ($user = mysqli_fetch_assoc($users)) { 
                            $data[] = $user;
                        }
                    }
                
                    header('Content-type: application/json; charset=utf-8');
                    echo json_encode($data);
                }
                
            break;
            
            case 'affichageTaxProvince':
                if (isset($data['provence_id'])) {
                    $taxes = getTaxes($data['provence_id']);
            
                    $data = [];

                    if (mysqli_num_rows($taxes) > 0) {
                        while ($tax = mysqli_fetch_assoc($taxes)) {
                            $data[] = $tax;
                        }
                    }

                    header('Content-type: application/json; charset=utf-8');
                    echo json_encode($data);
                }
            break;

            case 'affichageModeles':
                if (isset($data['marqueId'])) {
                    $modeles = getModeles($data['marqueId']);
            
                    $data = [];

                    if (mysqli_num_rows($modeles) > 0) {
                        while ($modele = mysqli_fetch_assoc($modeles)) {
                            $data[] = $modele;
                        }
                    }

                    header('Content-type: application/json; charset=utf-8');
                    echo json_encode($data);
                }
            break;
        }

        } else {
            
            echo 'Erreur action';					
    }
?>