<?php include_once(__DIR__ . './include/header.php');
require_once 'controleurs/chalets.php';
require_once 'controleurs/regions.php';
 ?>

  <main>
  
    <h1 class="my-4">Tous les chalets actifs</h1>
    <!-- Afficher la liste de tous les chalets actifs en ordre alphabétique -->

    <?php
        $controlerChalets= new ControleurChalet;
        $controlerChalets->afficherListeChaletActif();        
    ?>
    <!-- L'affichage doit être le même que celui utilisé pour l'affichage des chalets par région -->
	

    <h1 class="my-4">Tous les chalets</h1>

    <?php
        $controlerChalets= new ControleurChalet;
        $controlerChalets->afficherListe();        
    ?>

<h1 class="my-4">Tous les regions</h1>

<?php
$controleurRegions=new ControleurRegions;
$controleurRegions->afficherListeDeroulanteRegions();
  ?>
  </main>

<?php include_once(__DIR__ . './include/footer.php'); ?>

