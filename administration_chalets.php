<?php include_once(__DIR__ . './include/header.php'); ?>

  

	<?php
            if(isset($_SESSION["utilisateur"])){
              ?>
              <main>
  
	<h1>Administration - Chalets</h1>

	<p>
		<b>En construction. On présume que cette partie serait réalisée dans une phase ultérieure.</b>
	</p> 

	<p>
		Il doit être impossible d'accéder à cette page sans être préalablement connecté.<br> 
		Le menu Administration doit être présent seulement si l'utilisateur est connecté. <br>
		Si un utilisateur non connecté essaie d'accéder à la page, un message d'erreur doit s'afficher.
	</p>
  </main>
            
            <?php
} echo "Vous n'avez pas accès à ce contenu"

?>
<?php include_once(__DIR__ . './include/footer.php'); ?>