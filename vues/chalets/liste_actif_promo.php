<!-- Affichage en mode "liste" -->
<h2>Affichage de la liste actif en promo de chalet :

nombre actif en promo (<?php
echo count($chalets);
?>)

</h2>
<ul>


   <?php 
   
   foreach ($chalets as $chalet) {  ?> 
     
       <li><?= $chalet->nom ?>  </li>
   <?php 
  } ?>
</ul>