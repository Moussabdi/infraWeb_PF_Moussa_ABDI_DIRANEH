<?php include_once(__DIR__ . './include/header.php'); 
require_once 'controleurs/chalets.php';
?>

  <main>
  
    <h1 class="my-4">Promotions (chalets actifs en promotion)</h1>
    <!-- Afficher la liste de tous les chalets ACTIFS et EN PROMOTION en ordre alphabétique -->
    <!-- L'affichage doit être le même que celui utilisé pour l'affichage des chalets par région -->
    

    <?php
        $controlerChalets= new ControleurChalet;
        $controlerChalets->afficherListeChaletActifEnPromo();        
    ?>
  </main>

<?php include_once(__DIR__ . './include/footer.php'); ?>

