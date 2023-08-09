<?php include_once(__DIR__ . './include/header.php');
require_once 'controleurs/chalets.php';
require_once 'controleurs/regions.php';
 ?>

  <main>
  
    <h1 class="my-4">Tous les chalets actifs</h1>
    <!-- Afficher la liste de tous les chalets actifs en ordre alphabétique -->

    <?php
        $ControleurChalets= new ControleurChalet;
        $ControleurChalets->afficherListeChaletActif();        
    ?>
   
  </main>

<?php include_once(__DIR__ . './include/footer.php'); ?>

