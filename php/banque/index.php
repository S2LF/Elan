<?php


spl_autoload_register(function ($class_name) {
    require 'class/' . $class_name . '.php';
});



$gens1 = new Titulaire ("Formateur", "Virgile", "1984-01-16", "Strasbourg");
$gens2 = new Titulaire ("Formateur", "Mickaël", "1985-01-17", "Strasbourg");
echo $gens1;
echo $gens2;

$compte1 = new Compte ("courant", $gens1);
$compte3 = new Compte ("épargne", $gens1);
$compte2 = new Compte ("épargne", $gens2);


$compte1->crediter(-50);echo "<br>";
$compte1->crediter(500);echo "<br>";
$compte1->virement($compte2, 50);echo "<br>";

// echo "<br>";
// echo $compte1;
// echo $compte2;
echo "<br>";
echo $gens1->getInfosCompte();
echo $gens2->getInfosCompte();
