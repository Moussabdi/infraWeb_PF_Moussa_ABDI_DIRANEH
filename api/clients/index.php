<?php

require_once '../../controleurs/clients.php';

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    $controleurClients=new ControleurClients;
    $controleurClients->afficherFicheJSON();
}
?>