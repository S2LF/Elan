<?php

include ('function.php');

$title = 'Objet Personne'; 


$nom = $_POST["nom"];
$prenom = $_POST["prenom"];

ob_start();

$p1 = new Personne($nom, $prenom);
echo $p1;

$content = ob_get_clean();

require ('template/template.php');

