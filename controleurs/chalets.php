<?php

require_once './modeles/chalets.php';

class ControleurChalet {

    /***
     * Fonction permettant de récupérer l'ensemble des chalets et de les afficher sous forme de liste
     */
    function afficherListe() {
        $chalets = modele_chalet::ObtenirTous();
        require './vues/chalets/liste.php';
    }
/***
     * Fonction permettant de récupérer l'ensemble des chalets actif et de les afficher sous forme de liste
     */
    function afficherListeChaletActif() {
        $chalets = modele_chalet::ObtenirTousLesChaletsActif();
        require './vues/chalets/liste_actif.php';
    }

/***
     * Fonction permettant de récupérer l'ensemble des chalets actif et de les afficher sous forme de liste
     */
    function afficherListeChaletActifEnPromo() {
        $chalets = modele_chalet::ObtenirTousLesChaletsActifEnPromo();
        require './vues/chalets/liste_actif_promo.php';
    }

    /***
     * Fonction permettant de récupérer l'ensemble des chalets et de les afficher sous forme de tableau
     */
    function afficherTableau() {
        $chalets = modele_chalet::ObtenirTous();
        require './vues/chalets/tableau.php';
    }
    
    /***
     * Fonction permettant de récupérer l'ensemble des chalets et de les afficher sous forme de tableau avec boutons d'actions
     */
    function afficherTableauAvecBoutonsAction() {
        $chalets = modele_chalet::ObtenirTous();
        require './vues/chalets/tableau-avec-bouton-actions.php';
    }

    function afficherJSON(){
        $chalets=modele_chalet::ObtenirTous();
        echo json_encode($chalets);
    }
    /***
     * Fonction permettant de récupérer un chalet à partir de l'identifiant (id) 
     * inscrit dans l'URL, et l'affiche sous forme de carte
     */
    function afficherFiche() {
        if(isset($_GET["id"])) {
            $chalet = modele_chalet::ObtenirUn($_GET["id"]);
            if($chalet) {  // ou if($chalet != null)
                require './vues/chalets/fiche.php';           
            } else {
                $erreur = "Aucun chalet trouvé";
                require './vues/erreur.php';
            }
        } else {
            $erreur = "L'identifiant (id) du chalet à afficher est manquant dans l'url";
            require './vues/erreur.php';
        }
    }

  

}

?>