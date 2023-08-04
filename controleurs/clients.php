<?php

require_once __DIR__ . '/../modeles/clients.php';



class ControleurClients {
    
    /***
     * Fonction permettant de récupérer l'ensemble des clients et de les afficher sous forme de tableau avec boutons d'actions
     */
    function afficherTableauGestion() {
        $clients = modele_client::ObtenirTous();
        require  __DIR__ . '/../vues/clients/tableau-gestion.php';
        require __DIR__ . '/../vues/clients/dialogue-formulaire-ajout.php';
        require __DIR__ . '/../vues/clients/dialogue-fiche.php';
        require __DIR__ . '/../vues/clients/dialogue-formulaire-edition.php';
        require __DIR__ . '/../vues/clients/dialogue-formulaire-suppression.php';
    }

    /***
     * Fonction permettant de récupérer un client et retourner les données au format JSON
     */
    function afficherFicheJSON() {
       header('Content-Type: application/json; charset=utf-8');
       if(isset($_GET["id"])) {
            $client = modele_client::ObtenirUn($_GET["id"]);
            if($client) {  // ou if($client != null)
                echo json_encode($client);
            } else {
                http_response_code(404); // 404 : Not Found (https://developer.mozilla.org/fr/docs/Web/HTTP/Status/404)
                $erreur = "Aucun client trouvé";
                echo json_encode($erreur);
            }
        } else {
            http_response_code(400);  // 400 : Not Found (https://developer.mozilla.org/fr/docs/Web/HTTP/Status/400)
            $erreur = "L'identifiant (id) du client à afficher est manquant dans l'url";
            echo json_encode($erreur);
        }
    }

    /***
     * Fonction permettant d'ajouter un client
     */
    function ajouter() {
        if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['sex']) && isset($_POST['date_naissance']) && isset($_POST['lieu_residence'])) {
            $message = modele_client::ajouter($_POST['nom'], $_POST['prenom'], $_POST['sex'], $_POST['date_naissance'], $_POST['lieu_residence']);
            echo $message;
        } else {
            $erreur = "Impossible d'ajouter un client. Des informations sont manquantes";
            require __DIR__ . '/../vues/erreur.php';
        }
    }

    /***
     * Fonction permettant de modifier un client
     */
    function editer() {
        if(isset($_POST['id'], $_POST['nom']) && isset($_POST['prenom']) && isset($_POST['sex']) && isset($_POST['date_naissance']) && isset($_POST['lieu_residence'])) {
            $message = modele_client::editer($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['sex'], $_POST['date_naissance'], $_POST['lieu_residence']);
            echo $message;
        } else {
            $erreur = "Impossible de modifier le client. Des informations sont manquantes";
            require __DIR__ . '/../vues/erreur.php';
        }
    }

    /***
     * Fonction permettant de supprimer un client
     */
    function supprimer() {
        if(isset($_POST['id'])) {
            $message = modele_client::supprimer($_POST['id']);
            echo $message;
        } else {
            $erreur = "Impossible de supprimer le client. Des informations sont manquantes";
            require __DIR__ . '/../vues/erreur.php';
        }
    }

}

?>