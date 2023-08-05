<!-- Affichage en mode "tableau" -->
<h2>Affichage en mode "tableau" avec les options ajouter, afficher, modifier et supprimer</h2>

<button onclick="ouvrirDialogueAjout()">Ajouter</button>

<table>
    <tr>
        <th>Nom</th>        
        <th>Prenom</th>        
        <th>Sex</th>        
        <th>Date de naissance</th>
        <th>Lieu de résidence</th>
        <th>Action</th>
    </tr>

    <?php
        foreach ($clients as $client) {
    ?>
        <tr>
            <td><?= $client->nom ?></td>
            <td><?= $client->prenom?></td>
            <td><?= $client->sex?></td>
            <td><?= $client->date_naissance ?></td>
            <td><?= $client->lieu_residence ?></td>
            <td>
                <button onclick="ouvrirDialogueFiche(<?= $client->id ?>)">Afficher</button>
                <button onclick="ouvrirDialogueEdition(<?= $client->id ?>)">Modifier</button>
                <button onclick="ouvrirDialogueSuppression(<?= $client->id ?>)">Supprimer</button>
            </td>
        </tr>
    <?php
        }
    ?>
</table>