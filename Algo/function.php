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
    ?>

            <div>
                <label for="name"><?= $array[0] ?></label>
                <input type="text" name="name"> 
            </div>
            <div>
                <label for="prenom"><?= $array[1] ?></label>
                <input type="text" name="prenom">
            </div>
            <div>
                <label for="city"><?= $array[2] ?></label>
                <input type="text" name="city">
            </div>

    <?php   
}



function formPerso2($array){

    foreach ($array as $arr) {
       
    ?>
        <div>
            <label for="<?= $arr ?>"><?= $arr ?></label>
            <input type="text" name="<?= $arr ?>"> 
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

    public function __construct($marque="", $model="", $nbPortes=0, $vitesseActuelle=0) {
        $this->_marque = $marque;
        $this->_model = $model;
        $this->_nbPortes = $nbPortes;
        $this->_vitesseActuelle= $vitesseActuelle;
        $this->_etat= false;
    }

    public function getMarque() {
        return $this->_marque;
    }
    public function getModel() {
        return $this->_model;
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
                return "démmaré";
            }
        }

    
    public function setMarque($marque) {
        return $this->_marque = $marque;
    }
    public function setModel($model) {
        return $this->_model = $model;
    }
    public function setNbPortes($nbPortes) {
        return $this->_nbPortes = $nbPortes;
    }
    public function setVitesseActuelle($vitesseActuelle) {
        return $this->_vitesseActuelle = $vitesseActuelle;
    }
    public function setEtat($etat) {
        return $this->_etat = $etat;

    }


 
    public function demarrer(){
        echo "le véhicule $this->_marque $this->_model démarre";
        $this->setEtat(true);
    }
    public function accelerer($nb){
        echo "le véhicule $this->_marque $this->_model accélère de $nb km/h";
        $this->setVitesseActuelle($vitesseActuelle+$nb);
    }
    public function stopper(){
        echo "le véhicule $this->_marque $this->_model est stoppé";
        $this->setEtat(false);
    }


    public function __toString(){
        return "Nom et modèle de la voiture: $this->_marque $this->_model <br>
                Nombre de portes: $this->_nbPortes <br>
                Le véhicule $this->_marque est ". $this->getEtat() ." <br>
                Sa vitessse actuelle est de: $this->_vitesseActuelle km/h";
    }

} 
