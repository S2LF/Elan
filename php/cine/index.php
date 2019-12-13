<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php


spl_autoload_register(function ($class_name) {
    require 'class/' . $class_name . '.php';
});


$garthJennings=new Real ("Garth", "Jennings","1972-4-3", "homme" );
$georgeLucas= new Real ("Lucas", "George", "1944-5-14", "homme");

$sf=new Genre ("Science fiction");
$comedie=new Genre ("Comédie");

$harrisonFord = new Acteur ("Ford", "Harrison", "1942-8-13", "homme");
$hanSolo = new Role ("Han Solo");

$carrieFisher = new Acteur("Fisher","Carrie","","femme");
$leia = new Role("Princess Leia");

$davidProwse= new Acteur("Prowse", "David", "", "homme");
$christensen= new Acteur("Christensen", "Hayden", "", "homme");

$anakin = new Role("Anakin Skywalker");



$f1=new Film ("H2G2", 
              90, 
              "2005-9-7", 
              "Arthur Dent, un Britannique mène une existence sans histoire. 
                Très heureux, il a même rencontré la femme de sa vie. 
                Ses ennuis débutent lorsque la municipalité lui annonce que sa maison doit être rasée. 
                Ne sachant que faire, il se tourne vers son meilleur ami, Ford Prefect. Mais Arthur découvre que son vieux complice de toujours 
                est en fait un extraterrestre venant d'un monde très avancé scientifiquement.", 
              $sf, 
              $garthJennings);

$f2=new Film ("Star Wars épisode IV: un nouvel espoir", 
              123, 
              "1977-7-27", 
              "Il y a bien longtemps, dans une galaxie très lointaine... La guerre civile fait rage entre l'Empire galactique et l'Alliance rebelle. Capturée par les troupes de choc de l'Empereur menées par le sombre et impitoyable Dark Vador, la princesse Leia Organa dissimule les plans de l'Etoile Noire, une station spatiale invulnérable, à son droïde R2-D2 avec pour mission de les remettre au Jedi Obi-Wan Kenobi. Accompagné de son fidèle compagnon, le droïde de protocole C-3PO, R2-D2 s'échoue sur la planète Tatooine et termine sa quête chez le jeune Luke Skywalker. Rêvant de devenir pilote mais confiné aux travaux de la ferme, ce dernier se lance à la recherche de ce mystérieux Obi-Wan Kenobi, devenu ermite au coeur des montagnes désertiques de Tatooine... ", 
              $sf, 
              $georgeLucas);
$f3=new Film ("Star Wars épisode I: La menace Fantôme", 
              90, 
              "2000-7-27", 
              "Blablabla", 
              $sf, 
              $georgeLucas);


$c1 = new Casting ($f2, $harrisonFord, $hanSolo);
$c2 = new Casting ($f2, $carrieFisher, $leia);
$c3 = new Casting ($f2, $davidProwse, $anakin);
$c4 = new Casting ($f3, $christensen, $anakin);


// var_dump($f2);   
echo $f2;
$f2->getListCasting();
// var_dump($f2);   

// echo $f1;  

echo $sf->getListFilm();
echo $georgeLucas->getListFilm();

// echo $f2->getListCasting();

echo $anakin->getListRole();

echo $harrisonFord->getListRole();

echo date('G:i', mktime(0,90));



?>
</body>
</html>
