<?php
class Personne {

    private $_nom;
    private $_prenom;
    
    public function __construct($nom="", $prenom=""){
        $this->_nom = $nom;
        $this->_prenom = $prenom;
    }

    public function getNom() {
        return $this->_nom;
    }    
    public function getPrenom() {
        return $this->_prenom;
    }

    
    public function __toString(){
        return "Cette personnne s'appelle $this->_nom $this->_prenom";
    }



}