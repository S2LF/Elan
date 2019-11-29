<?php

function convertMajRouge($arg) {
    
    $arg= mb_strtoupper($arg);
    echo '<span style="color:red;">'.$arg.'</span>';

}

function afficherTableHTML($capitales) {
    ksort($capitales);
    foreach($capitales as $pays=>$capitale) {
        echo "<tr>
                <td>".mb_strtoupper($pays)."</td>
                <td>".ucfirst($capitale)."</td>
              </tr>";

    }
}

function afficherTableHtmlWiki($capitales) {
    ksort($capitales);
    foreach($capitales as $pays=>$capitale) {
        echo "<tr>
                <td>".mb_strtoupper($pays)."</td>
                <td>".ucfirst($capitale)."</td>
                <td><a href='https://fr.wikipedia.org/wiki/$capitale'target='blank'>Lien</a>
              </tr>";

    }
}



function formPerso($array){

    foreach ($array as $arr) {
       
    ?>
        <div>
            <label for="<?= ".mb_strotolower($arr)." ?>"><?= $arr ?></label>
            <input type="text" id="<?= ".mb_strotolower($arr)." ?>" name="<?= $arr ?>"> 
        </div>
    
    <?php
    }  
}

function Deroul($array){
    ?>
    
        <form action="">
            <label for="">Plutôt ?</label>
            <select name="choix" id="" >
            <?php
            foreach ($array as $arg){
                echo "<option value=''>$arg</option>";
            }
            ?>
            </select>
        </form> 
    <?php
    }


function genererCheckbox($elems){
    foreach($elems as $element => $checked) {
    ?>
        <div>
            <?php echo "<input type='checkbox' $checked> 
            <label for=$element> $element</label>" ?>
        </div>
    <?php
    }
}

function afficheN($arg, $nb) 
{

    while ( 0 < $nb){
        echo ("<img class='chiens' src='$arg'></img> ");

        $nb--;
    }
}


function genererRadio($elements){
    foreach($elements as $element){
        ?>
    
            <div>
                <input type="radio" id=".$element." name= "civ">
                <label for=$element><?= $element ?></label>
            </div>

        <?php
    }
}


function genererRadio2($elements){
    foreach($elements as $element){
        ?>
    
            <div>
                <input type="radio" id=".$element." name= "groupe">
                <label for=$element><?= $element ?></label>
            </div>

        <?php
    }
}

function formaterDateFr($arg){
    $bla = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
    echo ucwords($bla->format($arg));
}


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
            echo "le véhicule ".$this->getInfos()." accélère de $nb km/h. ";
            //$this->setVitesseActuelle($this->_vitesseActuelle+$nb);
            $this->_vitesseActuelle += $nb; 
            echo "Sa vitesse est donc maintenant de $this->_vitesseActuelle km/h.<br>";
        } else {
            echo "le véhicule ".$this->getInfos()." veut accélérer de $nb km/h<br>
            <span>/!\\ Il faut d'aborder démarrer le véhicule ".$this->getInfos()." /!\\</span><br>";
        }
    }

    
    public function ralentir($nb){
        if ($this->_etat && $this->getVitesseActuelle() >= 0 && $nb > 0) {
            echo "le véhicule ".$this->getInfos()." ralentit de $nb km/h. ";
            if ($this->_vitesseActuelle - $nb < 0) {
                $this->_vitesseActuelle = 0;
            } else  {
                $this->_vitesseActuelle -= $nb; 
            }
            echo "Sa vitesse est donc maintenant de $this->_vitesseActuelle km/h.<br>";

        } else {
            echo "le véhicule ".$this->getInfos()." veut ralentir de $nb km/h<br>
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

    
    public function setMarque() {
        $this->_marque = $marque;
    }
    public function setmodel() {
        $this->_model = $model;
    }


}
