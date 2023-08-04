<?php

require_once '../../controleurs/Clients.php';

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    $controleurClients=new ControleurClients;
    $controleurClients->afficherFicheJSON();
}
?>