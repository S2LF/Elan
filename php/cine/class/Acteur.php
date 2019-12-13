<?php

class Acteur extends AbsPersonne {
    private $casting;

    public function __construct($nom, $prenom, $dateNaissance, $sexe)
    {
        parent::__construct($nom, $prenom, $dateNaissance, $sexe);
        $this->casting = [];
    }

    public function ajouterCasting(Casting $casting){
        $this->casting[] = $casting; //array_push($this->casting, $c)
    }

    public function getListRole(){
        echo $this." a joué le rôle de: <br>";
        echo "<ul>";
        foreach($this->casting as $film){
            echo "<li>".$film->getRole()." dans ".$film->getFilm()->getTitre()."</li>";
        }
        echo "</ul>";
    }

}