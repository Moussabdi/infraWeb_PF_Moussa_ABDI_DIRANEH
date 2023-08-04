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
