<?php

class Titulaire {

    private $_nom;
    private $_prenom;
    private $_naissance;
    private $_ville;
    private $_compte;

    public function __construct($nom="", $prenom="", $naissance, $ville=""){
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_naissance = new DateTime($naissance);
        $this->_ville = $ville;
        $this->_compte = [];
    }

    
    public function getNom()
    {
        return $this->_nom;
    }
    public function setNom($nom)
    {
        $this->_nom = $_nom;

        return $this;
    }

 
    public function getPrenom()
    {
        return $this->_prenom;
    }
    public function setPrenom($prenom)
    {
        $this->_prenom = $prenom;

        return $this;
    }


    public function getNaissance()
    {
        return $this->_naissance->format('d/m/Y');
    }
    public function setNaissance($naissance)
    {
        $this->_naissance = $naissance;

        return $this;
    }

    public function getVille(){
        return $this->_ville;
    }
    public function setVille($ville){
        $this->_ville = $ville;

        return $this;
    }
    public function getCompte()
    {
        return $this->_compte;
    }

    public function ajouterCompte(Compte $compte){
        $this->_compte[] = $compte; //array_push($this->_compte, $compte);
    }

    public function getInfosCompte(){
        $InfoCompteArr = $this->getCompte();
        $j = "";
        foreach($InfoCompteArr as $InfoCompte){
            $j .= $InfoCompte->getLibelle()." a un solde de ".$InfoCompte->getSolde().".<br>";
        }
        return $this->getInfosTitulaire()." possède ".count($this->getCompte())." comptes bancaire.<br>
                ".$j;
    }

    public function getInfosTitulaire(){
        return $this->getNom()." ".$this->getPrenom();
    }

    public function __toString() {
        return $this->getInfosTitulaire()." est né le ".$this->getNaissance()." à ".$this->getVille().". <br>";
    }


}

 