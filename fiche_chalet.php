<!-- Cette page doit être utilisée pour affiher la fiche détaillée d'un chalet -->
<!-- Elle est volontairement vide, c'est à vous de la construire -->

<!-- La mise en forme est à votre discrétion. -->
<!-- Les informations à afficher sont le nom du chalet, la date (format de votre choix), la
description longue, et le prix -->


<!-- Assurez-vous que la page affiche l'entête et le pied de page, comme les autres pages -->

<?php include_once(__DIR__ . './include/header.php');
require_once './controleurs/chalets.php';?>

    <main>
    
        <h1>Détail information sur le chalet</h1>	
        <p>(Affichage d'un chalet : le nom du chalet, la date (format de votre choix), la
        description longue, et le prix)</p>
            
        <div class="container">       
                <?php
                    $controleurChalets= new ControleurChalet;
                    $controleurChalets->afficherFiche();
                ?>
        <a href="index.php">Retour à la liste des chalets</a>

        </div>

    </main>

<?php include_once(__DIR__ . './include/footer.php'); ?>
