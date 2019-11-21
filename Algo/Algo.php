<?php

// Exo 1
echo "Exo 1 <br><br>";

$formation = "Notre formation DL commence aujourd'hui";

echo "La phrase « $formation » contient ".strlen($formation)." caractères. <br>";

// Exo 2
echo "<br><br> Exo 2 <br><br>";

echo "La phrase « $formation » contient ".str_word_count($formation)." mots. <br>";

// Exo 3
echo "<br><br> Exo 3 <br><br>";

$remplaceFormation = str_replace("aujourd'hui", "demain", $formation);
    
echo "Le phrase « ".$remplaceFormation." » a remplacé le mot « aujourd'hui » par « demain ». <br>";

// Exo 4
echo "<br><br> Exo 4 <br><br>";

$pal = "Engage le jeu que je le gagne";

// mb_strtolower pour géré les accents et autres
$palMinus =str_replace(" ","",strtolower($pal));

$palInverse=strrev($palMinus);


if ($palMinus == $palInverse){
    echo "La phrase est un palindrome <br>";
} else {
    echo "La phrase n'est pas un palindrome <br>";
}

// OU

($palMinus == $palInverse) ? $rep = "Palindrome <br>" : $rep = "Pas Palindrome <br>";
echo $rep;

// Exo 5
echo "<br><br> Exo 5 <br><br>";


// $francs = 100;
// $euros = 15.24;
// $valeurFrancs = 65.6;
// $valeurEuros= ( $valeurFrancs * $euros ) / $francs;

// echo round($valeurEuros, 2), "<br>";

$valeurFrancs = 1000000;
$valeurEuros = $valeurFrancs / 6.55957;

echo round($valeurEuros, 2), "€ <br>";

// Pour changer , et espace au dessus de mille
echo number_format($valeurEuros, 2, ",", " "), "€ <br>"; 


// Exo 6
echo "<br><br> Exo 6 <br><br>";
$prixUnitaire = 9.99;
$quant = 5;
$tva = 0.2;

$facture = ( $prixUnitaire *  $quant );
$tvaFacture = $facture * $tva;

$finalFacture = $facture + $tvaFacture;

echo "Prix HT : $prixUnitaire <br>";
echo "Nb d'article: $quant <br>";
echo "Taux TVA: ".round($tva *100, 2)." % <br>";
echo "Facture finale: $finalFacture <br>";

// Exo 7
echo "<br><br> Exo 7 <br><br>";



/*
if ( $age == 6|| $age == 7 ) {
    echo "Votre enfant appartient à la catégorie « Poussin » <br>";
} else if ( $age == 8|| $age == 9 ){
    echo "Votre enfant appartient à la catégorie « Pupille » <br>";
} else if ( $age == 10|| $age == 11) {
    echo "Votre enfant apppartient à la catégorie « Minime » <br>";
} else if ( $age >= 12) {
    echo "Votre enfant apppartient à la catégorie « Cadet » <br>";
} else {
    echo "Votre enfant nappartient à aucune catégorie ! Il est trop jeune <br>";
};
*/
$age = 50;

/*
if ($age >= 18 || $age > 6) {
    echo "Catégorie non définie";
}else if ($age >= 12){
    echo "Cadet";
}else if ($age >= 10){
    echo "Minime";
}else if ($age >= 8){
    echo "Pupillle";
}else if ($age >= 6){
    echo "Poussin";
};
*/


switch (true) {
        case ( $age >= 18 ):
            echo "Trop vieux";
        break;
        case ( $age >= 12 ):
            echo "Cadet";
        break;
        case ( $age >= 10):
            echo "Minime";
        break;  
        case ( $age >= 8):
            echo "Pupille";
        break;
        case ( $age >= 6):
            echo "Poussin";
        break;
        default: echo "Pas de catégorie";
}



// Exo 8.1: boucle FOR
echo "<br><br> Exo 8.1: boucle FOR <br><br>";

$nbr = 1;
         
for ($i = 1; $i <= 10; $i++) {
    echo "$nbr X $i = ".($nbr*$i)." <br>";
}

// Exo 8.2
echo "<br><br> Exo 8.2: boucle WHILE <br><br>";

$j = 1;

while ($j <= 10):
    echo "$nbr X $j = ".($nbr*$j)." <br>";
    $j++;
endwhile;

// Exo 8.3
echo "<br><br> Exo 8.3: Fonction & Fonction avec Signature <br><br>";


function tableMultiplication($table){
    for ($i = 1; $i <= 10; $i++) { 
        echo "$table X $i = ".$table*$i." <br>";
    }
}

function tableMultiSignature($table, $nbTours) {
    if (is_numeric($table) && is_numeric($nbTours)) {
    
        for ($i = 1; $i <= $nbTours; $i++){ 
            echo "$table X $i = ".($table*$i)." <br>";
        }

    } else {
        echo "Nombre numérique demandé";
    }
}


tableMultiplication(1);
tableMultiSignature(2, 5);
tableMultiSignature("fromage", "sandwich");

// Exo 9
echo "<br><br> Exo 9 <br><br>";


$genre = "H";
$age =36;

echo "Age = $age <br> Genre = $genre <br>";
if ( $genre == "F" && $age >= 18 && $age <= 35 || $genre == "H" && $age >= 20 ) {
    echo "La personne est imposable";
} else {
    echo "La personne est non imposable";
};

// Exo 10.1 : intdiv() et Modulo%
echo "<br><br> Exo 10 <br><br>";

$payer = 152;
$verse = 200;
$reste = $verse - $payer;

echo "Montant à payer : ".$payer." € <br>
Montant versé: ".$verse." € <br>
Reste à payer: ".$reste." € <br>;
********************************** <br>";

$dizaine = intdiv($reste ,10);
if ($dizaine > 0) {
    echo $dizaine, " billets de 10€ - ";
}

$reste = $reste%10;
$cinq = intdiv($reste, 5);
if ($cinq > 0 ) {   
    echo $cinq, " billets de 5€ - ";
}

$reste = $reste%5;
$deux = intdiv($reste, 2);
if ($deux > 0 ) {
    echo $deux, " pièces de 2€ - ";
}

$reste = $reste%2;
$un = intdiv($reste, 1);
if ($un > 0) {
    echo $un, " pièces de 1€ <br>";
}

// Exo 10.2: Floor








// Exo 11
echo "<br><br> Exo 11 <br><br>";

$marque = array("Peugeot", "Renault", "BMW", "Mercedes");
var_dump($marque);
echo "Il y a ".count($marque)." marques de voitures dans le tableau:";

echo "<ul>";
foreach ( $marque as $logo ) {
    echo "<li>".$logo."</li>";
}
echo "</ul>";

array_push($marque, "Audi");

echo "Après un array_push: <br>";
echo "<ul>";
foreach ( $marque as $logo ) {
    echo "<li>".$logo."</li>";
}
echo "</ul>";


//Exo 12
echo "<br><br> Exo 12 <br><br>";


$prenoms = [ "Mickaël" => "FRA" , "Virgile" => "ESP", "Marie-Claire" => "ANG", "Patrick" => "RUS" ];
ksort($prenoms);
$langues = [ "FRA" => "Salut", "ESP" => "Hola", "ANG" => "Hello"];
var_dump($prenoms);

foreach ($prenoms as $prenom => $bonjour) {
    if(array_key_exists($bonjour, $langues)){
        echo "$langues[$bonjour], $prenom ! <br>";
    }   else {
        echo "Langue ($bonjour) de $prenom non géré<br>";
    }
}

//Exo 13
echo "<br><br> Exo 13 <br><br>";

$notes = [ "10", "12", "8", "19", "3", "16", "11", "13", "9" ];
sort($notes);

echo "Les notes de l'élèves sont: ";
foreach ($notes as $note) {
    echo "$note ";
}

$moyenne = array_sum($notes)/count($notes);

echo "<br> Sa moyenne générale est donc de : ".array_sum($notes)." / ".count($notes)." = ".round($moyenne, 2)."<br>";

//Exo 14
echo "<br><br> Exo 14 <br><br>";

$dateToday = new DateTime();
$dateNaissance = new DateTime("1985-01-17");
var_dump($dateNaissance);

echo "DateDuJours: ".$dateToday->format('d/m/Y')." <br>";
echo "Date de Naisssance: ".$dateNaissance->format('d/m/Y')." <br>";

$interval = $dateNaissance->diff($dateToday);
echo "Différence: ", $interval->format('%y ans, %m mois et %d jours <br><br>');
// echo $interval;

$maDateNaissance = new DateTime("1990-09-18");

echo "DateDuJours: ".$dateToday->format('d/m/Y')." <br>";
echo "Ma Date de Naisssance: ".$maDateNaissance->format('d/m/Y')." <br>";

$interval = $maDateNaissance->diff($dateToday);
echo "Différence: ", $interval->format('%y ans, %m mois et %d jours');



// Exo 15
echo "<br><br> Exo 15 <br><br>";

class Personne {
    // attribut
    private $_nom;
    private $_prenom;
    private $_dateNaissance;

    // constructeur
    public function __construct($nom="", $prenom="", $dateNaissance="") {
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_dateNaissance = new DateTime($dateNaissance);
    }

    // getters
    public function getNom(){
        return $this->_nom;
    }

    public function getPrenom(){
        return $this->_prenom;
    }

    public function getDateNaissance(){
        return $this->_dateNaissance;
    }
    
    public function getAge(){ // function pour récupérer l'âge.
        $now = new DateTime(); // Date aujourd'hui.
        $age = $this->getDateNaissance()->diff($now);
        return $age->format('%Y');
    }

    public function __toString(){
        return $this->getPrenom()." ".$this->getNom()." est né le ".$this->getDateNaissance()->format('d/m/Y').". Il a ".$this->getAge()." ans<br>";
    }
}

$p1 = new Personne ("GIBELLO", "Virgile", "1984-01-16");
$p2 = new Personne ("MURMANN", "Micka", "1985-01-17");

echo $p1;
echo $p2;
