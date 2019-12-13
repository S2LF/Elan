<?php

class Real extends AbsPersonne {
    private $films;

    public function __construct($nom, $prenom, $dateNaissance, $sexe)
    {
        parent::__construct($nom, $prenom, $dateNaissance, $sexe);
        $this->films = [];
    }


    public function ajouterFilm(Film $film){
        $this->films[]= $film;
    }

    public function __toString(){
        return $this->getPrenom()." ".$this->getNom();
    }

    public function getListFilm(){
        echo $this." a réalisé : <br>";
        echo "<ul>";
        foreach($this->films as $film){
            echo "<li>".$film->getTitre()."</li>";
        }
        echo "</ul>";
    }

    
}