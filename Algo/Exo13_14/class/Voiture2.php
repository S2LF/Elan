<?php

class Voiture2 {

    private $_marque;
    private $_model;

    public function __construct($marque="", $model="") {
        $this->_marque = $marque;
        $this->_model = $model;
    }


    public function getMarque() {
        return $this->_marque;
    }
    public function getModel() {
        return $this->_model;
    }
    public function getInfos() {
        return "La voiture $this->_marque $this->_model";
    }

    public function setMarque() {
        $this->_marque = $marque;
    }
    public function setmodel() {
        $this->_model = $model;
    }

}