<?php
    require_once('fonctionsDB.php');
    //require_once('../model/Enchere.php');
    //RequirePage::model('Enchere');

    $request_payload = file_get_contents('php://input');
    $data = json_decode($request_payload, true);

    if (isset($data['action'])) {

        // Switch en fonction de l'action envoyée
        switch ($data['action']) {

            case 'rechercheEncheres':
                if (isset($data['recherche'])) {
                    $encheres = rechercheEncheres($data['recherche']); 
                
                    $data = [];
                
                    if (mysqli_num_rows($encheres) > 0) {
                        // Récupérer la ligne suivante d'un ensemble de résultats sous forme de tableau associatif
                        while ($enchere = mysqli_fetch_assoc($encheres)) { 
                            $data[] = $enchere;
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