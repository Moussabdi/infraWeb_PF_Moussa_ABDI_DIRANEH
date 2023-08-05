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

}

?>

