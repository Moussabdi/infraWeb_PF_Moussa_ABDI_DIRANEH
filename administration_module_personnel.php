<?php include_once(__DIR__ . './include/header.php'); ?>

 
	<?php
            if(isset($_SESSION["utilisateur"])){
              ?>
   <main>
  
	<h1>Administration - Module personnel</h1>
	
	<!-- Cette section doit permettre de gérer (lister, ajouter, modifier et supprimer) des enregistrement d'une table que vous avez ajoutée à la base de données. -->
	<!-- Vous pouvez réaliser cette demande en utilisant plusieurs pages php (une pour l'ajout, une pour l'édition et une pour la suppression) ou utiliser des composants dialog ou Modals -->
	<!-- Il doit être impossible d'accéder à cette page sans être préalablement connecté. Si un utilisateur non connecté essaie d'accéder à la page, un message d'erreur doit s'afficher -->
	
	
  </main>
            
            <?php
} echo "Vous n'avez pas accès à ce contenu"

?>

<?php include_once(__DIR__ . './include/footer.php'); ?>