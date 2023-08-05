<?php

require_once "./include/config.php";

class modele_region {
    public $id; 
    public $nom; 


    /***
     * Fonction permettant de construire un objet de type modele_region
     */
    public function __construct($id, $nom) {
        $this->id = $id;
        $this->nom = $nom;
  
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
     * Fonction permettant de récupérer l'ensemble des regions 
     */
    public static function ObtenirTous() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT id, nom FROM regions ORDER BY nom");
        if(is_array($resultatRequete) || is_object($resultatRequete)){
        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_region($enregistrement['id'], $enregistrement['nom']);
        }}

        return $liste;
    }

    /***
     * Fonction permettant de récupérer un region en fonction de son identifiant
     */
    public static function ObtenirUn($id) {
        $mysqli = self::connecter();

        if ($requete = $mysqli->prepare("SELECT * FROM regions WHERE id=?")) {  // Création d'une requête préparée 
            $requete->bind_param("i", $id); // Envoi des paramètres à la requête

            $requete->execute(); // Exécution de la requête

            $result = $requete->get_result(); // Récupération de résultats de la requête¸
            
            if($enregistrement = $result->fetch_assoc()) { // Récupération de l'enregistrement
                $region = new modele_region($enregistrement['id'], $enregistrement['nom']);
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

        return $region;
    }

 
}

?>