<!-- Affichage en mode "liste" -->
<h2>Affichage de la liste actif par region de chalet :

nombre actif region 2 (<?php
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