<?php 


class VoitureElec extends Voiture2 {

    private $_autonomie;

    public function __construct($marque="", $model="",$autonomie="") {
        parent::__construct($marque, $model);
        $this->_autonomie = $autonomie;
    }

    public function getInfos(){
        echo parent::getInfos()." est électrique avec $this->_autonomie heures d'autonomies.";
    }
}