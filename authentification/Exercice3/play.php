<?php
require "jeu-combat.php";
//Création d'une instance de la classe Warrior
$warrior1 = new Warrior("Guerrier 1");

//Test de la fonction nomJoueur()
echo "Nom du joueur : " . $warrior1->nomJoueur() . "<br>";

//Test de la fonction degatSubit()
echo "Dégâts subits : " . $warrior1->degatSubit() . "<br>";

//Test de la fonction recevoirDegats()
$warrior1->recevoirDegats(5);
echo "Dégâts subits : " . $warrior1->degatSubit() . "<br>";

//Création d'une autre instance de la classe Warrior
$warrior2 = new Warrior("Guerrier 2");

//Test de la fonction frapper()
$warrior1->frapper($warrior2);
echo "Dégâts subits par le joueur 2 : " . $warrior2->degatSubit() . "<br>";

//Test de la fonction trouverCombat()
$combat = Fight::trouverCombat();
if ($combat) {
    echo "Un combat est disponible<br>";
} else {
    echo "Aucun combat disponible<br>";
}

//Création d'une instance de la classe Warrior
$warrior3 = new Warrior("Guerrier 3");

//Création d'un nouveau combat avec Guerrier 3 comme attaquant
$new_combat = Fight::creerCombat($warrior3);

//Rejoindre le combat avec Guerrier 1
$warrior1->rejoindreCombat($new_combat);

//Test de la fonction getAttaquant()
echo "Attaquant : " . $new_combat->getAttaquant()->nomJoueur() . "<br>";

//Test de la fonction getDefenseur()
echo "Défenseur : " . $new_combat->getDefenseur()->nomJoueur() . "<br>";

?>