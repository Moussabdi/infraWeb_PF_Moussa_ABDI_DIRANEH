<?php

require_once './modeles/regions.php';

class ControleurRegions {

    /***
     * Fonction permettant de récupérer l'ensemble des regions et de les afficher sous forme de liste déroulante
     */
    function afficherListeDeroulanteRegions() {
        $regions = modele_region::ObtenirTous();
        require './vues/regions/liste-deroulante.php';
    }
  

    function afficherUneSeuleRegion() {
        if(isset($_GET["id"])) {
            $region = modele_region::ObtenirUn($_GET["id"]);
            if($region) {  // ou if($produit != null)
                require './vues/regions/fiche.php';
            } else {
                $erreur = "Aucune région trouvée";
                require './vues/erreur.php';
            }
        } else {
            $erreur = "L'identifiant (id) de la région à afficher est manquant dans l'url";
            require './vues/erreur.php';
        }
    }

}

?>

