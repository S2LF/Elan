<?php

class NomClass {

    // Attributs ou propriété de la classe
        // Ce dont est constitué l'objet
        // Si il est "private", "public" ou "protected"
    // Constructeur
        // Permet de créer un nouvel objet NomClass
        // __construct
    // Getters & Setters (accesseurs et mutateur)
        // Permet d'accéder aux données et de modifier
        // public function getAttribut()
        // public function setAttribut($attribut)
    // Méthode toString
        // Permet de faire un echo de l'objet instancié
        // public function toString()
    
}



class Livre {
    
    // Attributs ou propriété de la classe

    private $_titre;
    private $_nbPages;
    private $_auteur;
    private $_edition;
    private $_genre;
    private $_prix;

    // Constructeur
    public function __construct($titre="", $nbPages=0, $auteur="", $edition="", $genre="", $prix=0) {
        $this->_titre = $titre; // On affecte la valeur.
        $this->_nbPages = $nbPages;
        $this->_auteur = $auteur;
        $this->_edition = $edition;
        $this->_genre = $genre;
        $this->_prix = $prix;
    }

    // Getter && setters (accesseurs et mutateur)
    
    // GETTERS
    public function getTitre() {
        return $this->_titre; // Retourne la valeur "Titre"
    }

    public function getNbPages(){
        return $this->_nbPages;
    }
    
    public function getAuteur(){
        return $this->_auteur;
    }

    public function getEdition(){
        return $this->_edition;
    }

    public function getGenre(){
        return $this->_genre;
    }

    public function getPrix(){
        return $this->_prix;
    }

    // SETTERS

    public function setTitre($titre){
        $this->_titre = $titre; // Modifie la valeur "Titre"
    }

    public function setNbPages($nbPages){
        $this->_nbPages = $nbPages;
    }

    public function setAuteur($auteur){
        $this->_auteur = $auteur;
    }

    public function setEdition($edition){
        $this->_edition = $edition;
    }

    public function setGenre($genre){
        $this->_genre = $genre;
    }
    
    public function setPrix($prix){
        $this->_prix = $prix;
    }

    // Méthode toString() pour faire un echo de l'objet
    public function __toString(){
        return "Le livre $this->_titre vaut $this->_prix € et possède $this->_nbPages pages.";
    }
}

// Instanciation d'un nouvel objet Livre

$livre1 = new Livre("Le Seigneur des Anneaux...", 300, "Tolkien", "Editions Mordor", "Fantasy", 35.99 );
$livre2 = new Livre("Harry Potter", 350, "Rowling", "Editions Poudlard", "Fantasy", 20.95);

echo $livre1->getTitre()." vaut ".$livre1->getPrix()." € <br>"; // Affiche Titre et Prix
$livre1->setPrix(50); // Modifie Prix
echo $livre1->getTitre()." vaut ".$livre1->getPrix()." € <br>";
$livre1->setTitre("Le Seigneur des Anneaux: la communauté de l'Anneau"); // Modifie Titre
echo $livre1->getTitre()." vaut ".$livre1->getPrix()." € <br>";

// Utilisation de toString

echo $livre1, "<br>";
echo $livre2, "<br>";


// On a rajouté au constructor des éléments par défaut. Si on rajoute un objet vide on autre ces données par défaut
$livre3 = new Livre();

echo $livre3;
