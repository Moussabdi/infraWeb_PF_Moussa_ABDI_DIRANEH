<!-- Affichage en mode "liste" -->
<h2>Affichage en mode "liste"

<?php
echo count($chalets);
?>

</h2>
<ul>
    <?php foreach ($chalets as $chalet) {  ?> 
        <li><?= $chalet->nom ?></li>
    <?php  } ?>
</ul>