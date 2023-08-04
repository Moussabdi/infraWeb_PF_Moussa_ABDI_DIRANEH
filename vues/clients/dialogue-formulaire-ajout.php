<dialog id="dialogue-formulaire-ajout">
    <form method="POST">
        <div>
          <div>
            <label for="nom">Nom *</label>   
            <input type="text" id="nom" name="nom" required maxlength="29">
          </div>
          <div>
            <label for="prenom">Prenom *</label>
            <input type="text" id="prenom" name="prenom" required  maxlength="29">
          </div>
        </div>
        <div>
          <div>
            <label for="sex">Sex *</label>
            <input type="text"  id="sex" name="sex" required maxlength="10">
          </div>
          <div>
            <label for="date_naissance">Date de naissance *</label>
            <input type="date" id="date_naissance" name="date_naissance" required  max="1900-01-01">
          </div>
          <div>
            <label for="lieu_residence">Lieu de résidence *</label>
            <input type="text" id="lieu_residence" name="lieu_residence" required  maxlength="29">
          </div>
         
        </div>

        <button name="boutonAjouter" type="submit">Ajouter un client</button>
        <button type="button" onclick="this.closest('dialog').close()">Annuler</button>
    </form>
</dialog>
    