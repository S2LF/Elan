<?php

class Voiture {

    private $_marque;
    private $_model;
    private $_nbPortes;
    private $_vitesseActuelle;
    private $_etat;

    public function __construct($marque="", $model="", $nbPortes=0) {
        $this->_marque = $marque;
        $this->_model = $model;
        $this->_nbPortes = $nbPortes;
        $this->_vitesseActuelle= 0;
        $this->_etat= false;
    }

    // GET
    public function getMarque() {
        return $this->_marque;
    }
    public function getModel() {
        return $this->_model;
    }
    public function getInfos(){
        return " ".$this->getMarque()." ".$this->getModel()." ";
    }
    public function getNbPortes() {
        return $this->_nbPortes;
    }
    public function getVitesseActuelle() {
        return $this->_vitesseActuelle;
    }
    public function getEtat() {
            if (!$this->_etat) {
                return "à l'arrêt";
            } else {
                return "démarré";
            }
        }
    public function getRoule() {
        echo "Le véhicule ".$this->getInfos()." roule à $this->_vitesseActuelle <br>";
    }

    // SET
    public function setMarque($marque) {
        $this->_marque = $marque;
    }
    public function setModel($model) {
        $this->_model = $model;
    }
    public function setNbPortes($nbPortes) {
        $this->_nbPortes = $nbPortes;
    }
    public function setVitesseActuelle($vitesseActuelle) {
        $this->_vitesseActuelle = $vitesseActuelle;
    }
    public function setEtat($etat) {
    $this->_etat = $etat;
    }


    public function demarrer(){
        echo "le véhicule ".$this->getInfos()." démarre<br>";
        $this->setEtat(true);
    }
    public function stopper(){
        echo "le véhicule ".$this->getInfos()." est stoppé<br>";
        $this->setEtat(false);
    }
    public function accelerer($nb){
        if ($this->_etat) {
            echo "le véhicule ".$this->getInfos()." accélère de ".abs($nb)." km/h. ";
            //$this->setVitesseActuelle($this->_vitesseActuelle+$nb);
            $this->_vitesseActuelle += abs($nb); 
            echo "Sa vitesse est donc maintenant de $this->_vitesseActuelle km/h.<br>";
        } else {
            echo "le véhicule ".$this->getInfos()." veut accélérer de ".abs($nb)." km/h<br>
            <span>/!\\ Il faut d'aborder démarrer le véhicule ".$this->getInfos()." /!\\</span><br>";
        }
    }


    public function ralentir($nb){
        if ($this->_etat && $this->getVitesseActuelle() >= 0 && $nb > 0) {
            echo "le véhicule ".$this->getInfos()." ralentit de ".abs($nb)." km/h. ";
            if ($this->_vitesseActuelle - abs($nb) < 0) {
                $this->_vitesseActuelle = 0;
            } else  {
                $this->_vitesseActuelle -= abs($nb); 
            }
            echo "Sa vitesse est donc maintenant de $this->_vitesseActuelle km/h.<br>";

        } else {
            echo "le véhicule ".$this->getInfos()." veut ralentir de ".abs($nb)." km/h<br>
            <span>/!\\ Il faut d'aborder démarrer le véhicule ".$this->getInfos()." ou que sa vitesse soit supérieur à 0  /!\\</span><br>";
        }
    }


    public function __toString(){
        return "Infos véhicule: <br>
                ****************<br>
                Nom et modèle de la voiture: ".$this->getInfos()." <br>
                Nombre de portes: ".$this->getNbPortes()." <br>
                Le véhicule $this->_marque est ". $this->getEtat() ." <br>
                Sa vitessse actuelle est de: ".$this->getVitesseActuelle()." km/h<br>
                ****************<br>";
    }




} 