<?php

require_once './modeles/chalets.php';

class ControleurChalet {

   
    function afficherListe() {
        $chalets = modele_chalet::ObtenirTous();
        require './vues/chalets/liste.php';
    }

    function afficherListeChaletActif() {
        $chalets = modele_chalet::ObtenirTousLesChaletsActif();
        require './vues/chalets/liste_actif.php';
    }

    function afficherListeChaletActifRegion1() {
        $chalets = modele_chalet::ObtenirTousLesChaletsActifParRegion1();
        require './vues/chalets/liste_actif_region1.php';
    }

    function afficherListeChaletActifRegion2() {
        $chalets = modele_chalet::ObtenirTousLesChaletsActifParRegion2();
        require './vues/chalets/liste_actif_region2.php';
    }
    function afficherListeChaletActifRegion3() {
        $chalets = modele_chalet::ObtenirTousLesChaletsActifParRegion3();
        require './vues/chalets/liste_actif_region3.php';
    }
    function afficherListeChaletActifRegion4() {
        $chalets = modele_chalet::ObtenirTousLesChaletsActifParRegion4();
        require './vues/chalets/liste_actif_region4.php';
    }

    function afficherListeChaletActifEnPromo() {
        $chalets = modele_chalet::ObtenirTousLesChaletsActifEnPromo();
        require './vues/chalets/liste_actif_promo.php';
    }

    function afficherTableau() {
        $chalets = modele_chalet::ObtenirTous();
        require './vues/chalets/tableau.php';
    }
    
    function afficherTableauAvecBoutonsAction() {
        $chalets = modele_chalet::ObtenirTous();
        require './vues/chalets/tableau-avec-bouton-actions.php';
    }

    function afficherJSON(){
        $chalets=modele_chalet::ObtenirTous();
        echo json_encode($chalets);
    }
   
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