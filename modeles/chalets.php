<?php

require_once "./include/config.php";

class modele_chalet {
    public $id; 
    public $nom; 
    public $description;
    public $personnes_max;
    public $prix_haute_saison;
    public $prix_basse_saison;
    public $actif; 
    public $promo; 
    public $date_inscription;

    /***
     * Fonction permettant de construire un objet de type modele_chalet
     */
    public function __construct($id, $nom, $description,$personnes_max, $prix_haute_saison, $prix_basse_saison,  $actif, $promo, $date_inscription) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->personnes_max = $personnes_max;
        $this->prix_haute_saison = $prix_haute_saison;
        $this->prix_basse_saison = $prix_basse_saison;
        $this->actif = $actif;
        $this->promo = $promo;
        $this->date_inscription = $date_inscription;
    }

    /***
     * Fonction permettant de se connecter à la base de données
     */
    static function connecter() {
        
        $mysqli = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);

        // Vérifier la connexion
        if ($mysqli -> connect_errno) {
            echo "Échec de connexion à la base de données MySQL: " . $mysqli -> connect_error;   // Pour fins de débogage
            exit();
        } 

        return $mysqli;
    }

    /***
     * Fonction permettant de récupérer l'ensemble des chalets 
     */
    public static function ObtenirTous() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT id, nom, description, personnes_max, prix_haute_saison, prix_basse_saison,actif, promo, date_inscription FROM chalets ORDER BY nom");
        if(is_array($resultatRequete) || is_object($resultatRequete)){
        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_chalet($enregistrement['id'], $enregistrement['nom'], $enregistrement['description'], $enregistrement['personnes_max'], $enregistrement['prix_haute_saison'], $enregistrement['prix_basse_saison'], $enregistrement['actif'], $enregistrement['promo'], $enregistrement['date_inscription']);
        }}

        return $liste;
    }

    /***
     * Fonction permettant de récupérer un chalet en fonction de son identifiant
     */
    public static function ObtenirUn($id) {
        $mysqli = self::connecter();

        if ($requete = $mysqli->prepare("SELECT * FROM chalets WHERE id=?")) {  // Création d'une requête préparée 
            $requete->bind_param("i", $id); // Envoi des paramètres à la requête

            $requete->execute(); // Exécution de la requête

            $result = $requete->get_result(); // Récupération de résultats de la requête¸
            
            if($enregistrement = $result->fetch_assoc()) { // Récupération de l'enregistrement
                $chalet = new modele_chalet($enregistrement['id'], $enregistrement['nom'], $enregistrement['description'], $enregistrement['personnes_max'], $enregistrement['prix_haute_saison'], $enregistrement['prix_basse_saison'], $enregistrement['actif'], $enregistrement['promo'], $enregistrement['date_inscription']);
            } else {
                //echo "Erreur: Aucun enregistrement trouvé.";  // Pour fins de débogage
                return null;
            }   
            
            $requete->close(); // Fermeture du traitement 
        } else {
            echo "Une erreur a été détectée dans la requête utilisée : ";   // Pour fins de débogage
            echo $mysqli->error;
            return null;
        }

        return $chalet;
    }


    public static function ObtenirTousLesChaletsActif() {
      $liste = [];
      $mysqli = self::connecter();    
      $resultatRequete = $mysqli->query("SELECT id, nom, description, personnes_max, prix_haute_saison, prix_basse_saison, actif, promo, date_inscription FROM chalets WHERE actif=1 ORDER BY nom");
      if(is_array($resultatRequete) || is_object($resultatRequete)){
      foreach ($resultatRequete as $enregistrement) {
          $liste[] = new modele_chalet($enregistrement['id'], $enregistrement['nom'], $enregistrement['description'], $enregistrement['personnes_max'], $enregistrement['prix_haute_saison'], $enregistrement['prix_basse_saison'], $enregistrement['actif'],  $enregistrement['promo'], $enregistrement['date_inscription']);
      }}
    
      return $liste;
  }

 
}

?>