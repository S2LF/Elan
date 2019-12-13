<?php

abstract class AbsPersonne {
    

    private $nom;
    private $prenom;
    private $dateNaissance;
    private $sexe;


    public function __construct($nom, $prenom, $dateNaissance, $sexe)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = new DateTime($dateNaissance);
        $this->sexe = $sexe;
    }

    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance()
    {
        return $this->dateNaissance->format('d/m/Y');
    }
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getSexe()
    {
        return $this->sexe;
    }
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function __toString(){
        return $this->getPrenom()." ".$this->getNom();
    }

}