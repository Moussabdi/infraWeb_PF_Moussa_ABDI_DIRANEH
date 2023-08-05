<?php

require_once __DIR__ . '../../include/config.php';

class modele_client {
    public $id; 
    public $nom; 
    public $prenom;
    public $sex;
    public $date_naissance;
    public $lieu_residence;

    /***
     * Fonction permettant de construire un objet de type modele_client
     */
    public function __construct($id, $nom, $prenom, $sex, $date_naissance, $lieu_residence) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->sex = $sex;
        $this->date_naissance = $date_naissance;
        $this->lieu_residence = $lieu_residence;
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
     * Fonction permettant de récupérer l'ensemble des clients
     */
    public static function ObtenirTous() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT id, nom, prenom, sex, date_naissance, lieu_residence FROM clients ORDER BY prenom");
        if(is_array($resultatRequete) || is_object($resultatRequete)){
        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_client($enregistrement['id'], $enregistrement['nom'], $enregistrement['prenom'], $enregistrement['sex'], $enregistrement['date_naissance'], $enregistrement['lieu_residence']);
        }}

        return $liste;
    }

    /***
     * Fonction permettant de récupérer un client en fonction de son identifiant
     */
    public static function ObtenirUn($id) {
        $mysqli = self::connecter();

        if ($requete = $mysqli->prepare("SELECT * FROM clients WHERE id=?")) {  // Création d'une requête préparée 
            $requete->bind_param("i", $id); // Envoi des paramètres à la requête

            $requete->execute(); // Exécution de la requête

            $result = $requete->get_result(); // Récupération de résultats de la requête¸
            
            if($enregistrement = $result->fetch_assoc()) { // Récupération de l'enregistrement
                $client = new modele_client($enregistrement['id'], $enregistrement['nom'], $enregistrement['prenom'], $enregistrement['sex'], $enregistrement['date_naissance'], $enregistrement['lieu_residence']);
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

        return $client;
    }

    /***
     * Fonction permettant d'ajouter un client
     */
    public static function ajouter($nom, $prenom, $sex, $date_naissance, $lieu_residence) {
        $message = '';

        $mysqli = self::connecter();
        
        // Création d'une requête préparée
        if ($requete = $mysqli->prepare("INSERT INTO clients(nom, prenom, sex, date_naissance, lieu_residence) VALUES(?, ?, ?, ?, ?)")) {      

        /************************* ATTENTION **************************/
        /* On ne fait présentement peu de validation des données.     */
        /* On revient sur cette partie dans les prochaines semaines!! */
        /**************************************************************/

        $requete->bind_param("sssss", $nom, $prenom, $sex, $date_naissance, $lieu_residence);

        if($requete->execute()) { // Exécution de la requête
            $message = "Pour votre info, le client a été ajouté dans le tableau!";  // Message ajouté dans la page en cas d'ajout réussi
        } else {
            $message =  "Une erreur est survenue lors de l'ajout: " . $requete->error;  // Message ajouté dans la page en cas d’échec
        }

        $requete->close(); // Fermeture du traitement

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";   // Pour fins de débogage
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }

    /***
     * Fonction permettant d'éditer un client
     */
    public static function editer($id, $nom, $prenom, $sex, $date_naissance, $lieu_residence) {
        $message = '';

        $mysqli = self::connecter();
        
        // Création d'une requête préparée
        if ($requete = $mysqli->prepare("UPDATE clients SET nom=?, prenom=?, sex=?, date_naissance=?, lieu_residence=? WHERE id=?")) {      

        /************************* ATTENTION **************************/
        /* On ne fait présentement peu de validation des données.     */
        /* On revient sur cette partie dans les prochaines semaines!! */
        /**************************************************************/

        $requete->bind_param("sssssi", $nom, $prenom, $sex, $date_naissance, $lieu_residence, $id);

        if($requete->execute()) { // Exécution de la requête
            $message = "Client modifié";  // Message ajouté dans la page en cas d'ajout réussi
        } else {
            $message =  "Une erreur est survenue lors de l'édition: " . $requete->error;  // Message ajouté dans la page en cas d’échec
        }

        $requete->close(); // Fermeture du traitement

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }

    /***
     * Fonction permettant de supprimer un client
     */
    public static function supprimer($id) {
        $message = '';

        $mysqli = self::connecter();
        
        // Création d'une requête préparée
        if ($requete = $mysqli->prepare("DELETE FROM clients WHERE id=?")) {      

        /************************* ATTENTION **************************/
        /* On ne fait présentement peu de validation des données.     */
        /* On revient sur cette partie dans les prochaines semaines!! */
        /**************************************************************/

        $requete->bind_param("i", $id);

        if($requete->execute()) { // Exécution de la requête
            $message = "Client supprimé";  // Message ajouté dans la page en cas d'ajout réussi
        } else {
            $message =  "Une erreur est survenue lors de la suppression: " . $requete->error;  // Message ajouté dans la page en cas d’échec
        }

        $requete->close(); // Fermeture du traitement

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }
}

?>