<div class="card">
  <img src="https://picsum.photos/200" alt="une photo aléatoire">
  <div class="container">
    <h3><b>Nom du chalet : <?= $chalet->nom ?></b></h3>
    <p>Description: <?= $chalet->description ?></p>
    <p>Nombre de personnes maximum: <?= $chalet->personnes_max ?></p>
    <p>Prix de haute saison: <?= $chalet->prix_haute_saison ?>$</p>
    <p>Prix de basse saison: <?= $chalet->prix_basse_saison ?>$</p>
    <p>Dated'inscription: <?= $chalet->date_inscription ?></p>
  </div>
</div>