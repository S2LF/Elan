<?php

class Compte {
    private $_libelle;
    private $_titulaire;
    private $_solde;

    public function __construct($libelle="", Titulaire $titulaire){
        $this->_libelle = $libelle;
        $this->_titulaire = $titulaire;
        $this->_solde = $solde = 0;
        $titulaire->ajouterCompte($this);
    }


    public function getLibelle()
    {
        return $this->_libelle;
    }
    public function setLibelle($_libelle)
    {
        $this->_libelle = $libelle;
        return $this;
    }

    
    public function getSolde()
    {
        return $this->_solde;
    }
    public function setSolde($_solde)
    {
        $this->_solde = $solde;
        return $this;
    }

    public function getTitulaire()
    {
        return $this->_titulaire;
    }
    public function setTitulaire($titulaire)
    {
        $this->_titulaire = $titulaire;

        return $this;
    }

    public function getInfosCompte(){
        echo "Le compte ".$this->getLibelle()." de ".$this->getTitulaire()->getInfosTitulaire();
    }



    public function crediter($nb){
        $this->_solde += abs($nb);
        echo $this->getInfosCompte()." a été crédité de ".abs($nb)." €.
        Son solde est actuellement de ".$this->getSolde()."€.<br>";
    }
    public function debiter($nb){
        $this->_solde -= abs($nb);
        echo $this->getInfosCompte()." a été débité de ".abs($nb)." €.
        Son solde est actuellement de ".$this->getSolde()."€.<br>";
    }

    public function virement($compte, $montant){
        $compte->crediter($montant);
        $this->debiter($montant);
    }

    public function __toString(){
        return $this->getInfosCompte()." a un solde de ".$this->getSolde()."€ <br>";
    }
}
