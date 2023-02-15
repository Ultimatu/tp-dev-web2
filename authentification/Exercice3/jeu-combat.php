<?php
/**
 * Class qui permet d'instancier et gérer le joueur.
 */
class Warrior{
    /**
     * nom du joueur 
     * */
    private $nom;
    /**
     * dégats du joueur 
     * */
    private $degats;

    //Initialisation des parametre du joueur
    public function __construct($nom)
    {
        $this->nom = $nom;
        $this->degats = 0;

        $db = new PDO('mysql:host=localhost;dbname=minijeu', 'root', '');
        $req = $db->prepare('SELECT * FROM guerriers WHERE nom = :nom');
        $req->execute(
            array(
                'nom' => $this->nom,
            )
        );
        $result = $req->fetch();
        if ($result) {
            // Mettre à jour les dégâts dans la base de données
            $req = $db->prepare('UPDATE guerriers SET degats = :degats WHERE nom = :nom');
            $req->execute(
                array(
                    'nom' => $this->nom,
                    'degats' => $this->degats,
                )
            );
        } else {
            // Ajout du joueur dans la base de données
            $req = $db->prepare('INSERT INTO guerriers (nom, degats) VALUES (:nom, :degats)');
            $req->execute(
                array(
                    'nom' => $this->nom,
                    'degats' => $this->degats,
                )
            );
        }
    }

    /**
     * function retournant le nom du joueur actuel.
     */
    public function nomJoueur()
    {
        return $this->nom;
    }
    /**
     * function retournant les dégâts subit par le joueur actuel.
     */
    public function degatSubit(){
        return $this->degats;
    }
    /**
     * function qui permet d'infliger des dégâts au joueur actuel.
     */
    public function recevoirDegats($degats){
        $this->degats += $degats;
        //Mettre à jour les dégâts dans la base de données
        $db = new PDO('mysql:host=localhost;dbname=minijeu', 'root', '');
        $req = $db->prepare('UPDATE guerriers SET degats = :degats WHERE nom = :nom');
        $req->execute(
            array(
                'nom' => $this->nom,
                'degats' => $this->degats,
            )
        );
    }

    /**
     * Function qui permet de frapper un joueur.
     */
    public function frapper(Warrior $guerrier)
    {
        if ($guerrier->degats >= 100) {
            echo "Le guerrier " . $guerrier->nomJoueur() . " est mort.";
        }
        else{
            // Calculer les dégâts causés
            $puissance_frappe = rand(1, 10);
            $guerrier->recevoirDegats($this->degats + $puissance_frappe);

            // Enregistrer le combat
            $combat = new Fight($this->getId());
            $combat->enregistrerCombat($guerrier, $this);
        }
    }
    public  function getId()
    {
        $db = new PDO('mysql:host=localhost;dbname=minijeu', 'root', '');
        $req = $db->prepare('SELECT id FROM guerriers WHERE nom = :nom');
        $req->execute(array('nom' => $this->nom));
        $result = $req->fetch();
        return $result['id'];
    }


}
class Fight

{
    private $id;
    private $id_attaquant;
    private $id_defenseur;
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Function qui permet de trouver un combat disponible dans la base de données.
     */
    public static function trouverCombat()
    {
        $db = new PDO('mysql:host=localhost;dbname=minijeu', 'root', '');
        $req = $db->prepare('SELECT * FROM combats WHERE id_defenseur IS NULL LIMIT 1');
        $req->execute();
        $combat = $req->fetch();
        if ($combat) {
            return new Fight($combat['id']);
        } else {
            return false;
        }
    }

   

    /**
     * Function qui permet de rejoindre un combat.
     */
    public function rejoindreCombat(Warrior $guerrier)
    {
        $this->id_defenseur = $guerrier->getId();
        //Mettre à jour les informations sur le combat dans la base de données
        $db = new PDO('mysql:host=localhost;dbname=minijeu', 'root', '');
        $req = $db->prepare('UPDATE combats SET id_defenseur = :id_defenseur WHERE id = :id');
        $req->execute(
            array(
                'id' => $this->id,
                'id_defenseur' => $this->id_defenseur,
            )
        );
    }

    /**
     * Function qui retourne l'objet joueur qui représente l'attaquant.
     */
    

    /**
     * Function qui retourne l'objet joueur qui représente le défenseur.
     */
    public function getDefenseur()
    {
        return Fight::getId($this->id_defenseur);
    }

   
    public function afficherCombat(int $id_combat) {
        // Connexion à la base de données
        
        $conn = new PDO("mysql:host=localhost;dbname=combats, root, ''");

        // Préparation de la requête de sélection
        $stmt = $conn->prepare("SELECT * FROM combats WHERE id = :id_combat");

        // Liaison des paramètres
        $stmt->bindParam(':id_combat', $id_combat);

        // Exécution de la requête
        $stmt->execute();

        // Récupération des données
        $combat = $stmt->fetch(PDO::FETCH_ASSOC);

        // Récupération des informations sur les guerriers
        $attaquant = Fight::getId($combat['id_attaquant']);
        $defenseur = Fight::getId($combat['id_defenseur']);


        // Détermination du vainqueur
        if ($attaquant->getDegats() < $defenseur->getDegats()) {
            echo $attaquant->getNom() . " a gagné le combat contre " . $defenseur->getNom() . " avec " . $attaquant->getDegats() . " points de dégâts contre " . $defenseur->getDegats() . " pour " . $defenseur->getNom() . "\n";
        } else {
            echo $defenseur->getNom() . " a gagné le combat contre " . $attaquant->getNom() . " avec " . $defenseur->getDegats() . " points de dégâts contre " . $attaquant->getDegats() . " pour " . $attaquant->getNom() . "\n";
        }
    }
    /**
     * Enregistre les informations du combat dans la base de données.
     * @param Warrior $attaquant L'attaquant dans le combat.
     * @param Warrior $defenseur Le défenseur dans le combat.
     * @param int $degats Les dégâts infligés par l'attaquant au défenseur.
     */
    public function enregistrerCombat(Warrior $attaquant, Warrior $defenseur)
    {
        $db = new PDO('mysql:host=localhost;dbname=minijeu', 'root', '');
        $req = $db->prepare('INSERT INTO combats (id_attaquant, id_defenseur, degats) VALUES (:id_attaquant, :id_defenseur)');
        $req->execute(
            array(
                'id_attaquant' => $attaquant->getId(),
                'id_defenseur' => $defenseur->getId()
            )
        );
    }
}
class Jeu{
    public function reinitialiser(){
        $this->pdo = new PDO('mysql:host=localhost;dbname=minijeu', 'root', '');

        try {
            $this->pdo->beginTransaction();
            $this->pdo->exec('SET FOREIGN_KEY_CHECKS=0;');
            $this->pdo->exec('DROP TABLE guerriers');
            $this->pdo->exec('DROP TABLE combats');
            $this->pdo->exec('SET FOREIGN_KEY_CHECKS=1;');
            $this->pdo->commit();
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            echo 'Échec lors de la suppression des tables : ' . $e->getMessage();
        }

        $req1 = $this->pdo->prepare("CREATE TABLE guerriers (
            id INT PRIMARY KEY AUTO_INCREMENT,
            nom VARCHAR(255) NOT NULL,
            degats INT DEFAULT 0
        )");

        $req2 = $this->pdo->prepare("CREATE TABLE combats (
            id INT PRIMARY KEY AUTO_INCREMENT,
            id_attaquant INT,
            id_defenseur INT,
            FOREIGN KEY (id_attaquant) REFERENCES guerriers(id),
            FOREIGN KEY (id_defenseur) REFERENCES guerriers(id)
        )");

        try {
            $this->pdo->beginTransaction();
            $req1->execute();
            $req2->execute();
            $this->pdo->commit();
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            echo 'Échec lors de la création des tables : ' . $e->getMessage();
        }
    }
}




//Création des joueurs
$joueur1 = new Warrior('Joueur 4');
$joueur2 = new Warrior('Joueur 5');

//Affichage des noms des joueurs
echo $joueur1->nomJoueur() . " a " . $joueur1->degatSubit() . " dégâts." . PHP_EOL;
echo $joueur2->nomJoueur() . " a " . $joueur2->degatSubit() . " dégâts." . PHP_EOL;

//Frapper le joueur 2
$joueur1->frapper($joueur2);

//Affichage des noms des joueurs
echo $joueur1->nomJoueur() . " a " . $joueur1->degatSubit() . " dégâts." . PHP_EOL;
echo $joueur2->nomJoueur() . " a " . $joueur2->degatSubit() . " dégâts." . PHP_EOL;


?>