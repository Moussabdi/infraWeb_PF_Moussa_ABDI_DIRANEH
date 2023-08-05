<dialog id="dialogue-formulaire-edition">
    <h1>Éditer un client</h1>
    <form method="POST">
        <div>
            <div>
                <label for="nom">Nom *</label>
                <input type="text" id="dialogue-formulaire-edition-nom" name="nom" required maxlength="29" value="<?= $client->nom ?>">
            </div>
            <div>
                <label for="prenom">Prenom *</label>           
                <input type="text" id="dialogue-formulaire-edition-prenom" name="prenom" required  maxlength="29" value="<?= $client->prenom ?>">
            </div>

            <div>
                <label for="sex">Sex *</label>           
                <input type="text" id="dialogue-formulaire-edition-sex" name="sex" required  maxlength="10" value="<?= $client->sex ?>">
            </div>

            <div>
                <label for="date_naissance">Date de naissance *</label>           
                <input type="date" id="dialogue-formulaire-edition-date-naissance" name="date_naissance" required  value="<?= $client->date_naissance ?>">
            </div>

            <div>
                <label for="lieu_residence">Lieu de résidence *</label>           
                <input type="" id="dialogue-formulaire-edition-lieu-residence" name="lieu_residence" required  maxlength="29" value="<?= $client->lieu_residence?>">
            </div>
        </div>

       

        <button name="boutonEditer" type="submit">Modifier un client</button>
        <button type="button" onclick="this.closest('dialog').close()">Annuler</button>
        <input type="hidden" id="dialogue-formulaire-edition-id" name="id" value="">
    </form>                         
</dialog>