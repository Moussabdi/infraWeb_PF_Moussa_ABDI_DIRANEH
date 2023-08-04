function ouvrirDialogueFiche(id) {
  console.log("appel de la méthode ouvrirDialogueFiche");
  console.log(id); // Pour débogage
  dialogue = document.getElementById("dialogue-fiche");

  const client = getClient(id).then((client) => {
    console.log(client);
    if (client) {
      document.getElementById("dialogue-fiche-nom").textContent = client.nom;

      document.getElementById("dialogue-fiche-prenom").textContent =
        client.prenom;

      dialogue.showModal();
    }
  });
}

function ouvrirDialogueAjout() {
  console.log("appel de la méthode ouvrirDialogueAjout");
  dialogue = document.getElementById("dialogue-formulaire-ajout");
  dialogue.showModal();
}

function ouvrirDialogueEdition(id) {
  console.log("appel de la méthode ouvrirDialogueEdition");
  console.log(id); // Pour débogage
  dialogue = document.getElementById("dialogue-formulaire-edition");
  const client = getClient(id).then((client) => {
    console.log(client);
    if (client) {
      document.getElementById("dialogue-formulaire-edition-id").value =
        client.id;
      document.getElementById("dialogue-formulaire-edition-nom").value =
        client.nom;
      document.getElementById("dialogue-formulaire-edition-prenom").value =
        client.prenom;
      document.getElementById("dialogue-formulaire-edition-sex").value =
        client.sex;
      document.getElementById(
        "dialogue-formulaire-edition-date-naissance"
      ).value = client.date_naissance;
      document.getElementById(
        "dialogue-formulaire-edition-lieu-residence"
      ).value = client.lieu_residence;

      dialogue.showModal();
    }
  });
}

function ouvrirDialogueSuppression(id) {
  console.log("appel de la méthode ouvrirDialogueSuppression");
  console.log(id); // Pour débogage
  dialogue = document.getElementById("dialogue-formulaire-suppression");

  const client = getClient(id).then((client) => {
    console.log(client);
    if (client) {
      document.getElementById("dialogue-suppression-nom").textContent =
        client.nom;
      document.getElementById("dialogue-formulaire-suppression-id").value =
        client.id;

      dialogue.showModal();
    }
  });
}

async function getClient(id) {
  let response = await fetch("api/clients/?id=" + id);

  if (response.ok) {
    return await response.json(); // retourne le client
  } else {
    alert(
      "Il y a eu un problème avec l'opération fetch. Voir la console pour plus de détails "
    );
    console.log(await response.json()); // affiche l'erreur
  }
}
