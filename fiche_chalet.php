

<!-- Cette page doit être utilisée pour affiher la fiche détaillée d'un chalet -->
<!-- Elle est volontairement vide, c'est à vous de la construire -->

<!-- La mise en forme est à votre discrétion. -->
<!-- Les informations à afficher sont le nom du chalet, la date (format de votre choix), la
description longue, et le prix -->


<!-- Assurez-vous que la page affiche l'entête et le pied de page, comme les autres pages -->

<?php include_once(__DIR__ . './include/header.php'); 

?>

  <main>
  
	<h1>Module personnel</h1>	
    <p>(Affichage de la liste de client)</p>
    
<?php require_once 'controleurs/clients.php';

$controleurClients=new ControleurClients;

if (isset($_POST['boutonAjouter'])) {        
    $controleurClients->ajouter();
} else if (isset($_POST['boutonEditer'])) {      
    $controleurClients->editer();
} else if (isset($_POST['boutonSupprimer'])) {        
    $controleurClients->supprimer();
} 
?>

<div class="container">
        

        <h1>Liste des clients</h1>

        <?php
            $controleurClients->afficherTableauGestion();
        ?>

    </div>


  </main>

<?php include_once(__DIR__ . './include/footer.php'); ?>
