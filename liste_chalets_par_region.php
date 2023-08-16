<?php include_once(__DIR__ . './include/header.php'); 
require_once 'controleurs/chalets.php';
require_once 'controleurs/regions.php';?>

  <main>
  
    <h1>Région</h1>
    <!-- Afficher la liste de tous les chalets actifs appartenant à la région sélectionnée, en ordre alphabétique -->
    <!-- L'affichage est à votre discrétion -->

    <?php
        $controlerChalets= new ControleurChalet;
        $controlerChalets->afficherListeChaletActifRegion1();        
    ?>

<?php
        $controlerChalets= new ControleurChalet;
        $controlerChalets->afficherListeChaletActifRegion2();        
    ?>

<?php
        $controlerChalets= new ControleurChalet;
        $controlerChalets->afficherListeChaletActifRegion3();        
    ?>

<?php
        $controlerChalets= new ControleurChalet;
        $controlerChalets->afficherListeChaletActifRegion4();        
    ?>
	
  </main>

<?php include_once(__DIR__ . './include/footer.php'); ?>

