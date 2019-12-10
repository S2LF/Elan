<?php

spl_autoload_register(function ($class_name) {
    require 'class/' . $class_name . '.php';
});


// Exo 13
echo "<br><br> Exo 13 <br><br>";


$v1 = new Voiture("Peugeot", "408", 5);
$v2 = new Voiture("Citroën", "C4", 3);

echo $v1, "<br><br>";
echo $v2;

echo "<br><br>";

$v1->demarrer();
$v1->accelerer(50);
echo "<br><br>";
echo $v1;
$v2->demarrer();
$v2->stopper();
$v2->accelerer(20);

$v1->getRoule();
$v2->getRoule();
echo "<br><br>";
$v2->ralentir(10);
$v1->ralentir(10);
echo "<br><br>";
$v2->demarrer();
$v2->ralentir(10);
$v2->accelerer(5);
$v2->ralentir(10);
$v2->accelerer(5);
$v2->ralentir(10);

$v3 = new Voiture("BMW", "X4", 5);
$v3->demarrer();

$v3->accelerer(50);
$v3->ralentir(50);
$v3->stopper();
$v3->accelerer(50);
echo $v3;


// Exo 14
echo "<br><br> Exo 14 <br><br>";

$v1 = new Voiture2("Peugeot", "408");
$ve1 = new VoitureElec("BMW", "I3", 100);

echo $v1->getInfos()."<br>";
echo $ve1->getInfos()."<br>";
