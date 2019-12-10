<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Algo2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

include 'function.php';

// Exo 1
echo "<br><br> Exo 1 <br><br>";


$texte = "Mon texte en paramètres";


convertMajRouge($texte);

// Exo 2
echo "<br><br> Exo 2 <br><br>";


$capitales = ["France" =>"paris", "Allemagne"=>"berlin", "USA"=>"Washington", "Italie"=>"Rome"];




?>
 <table>
    <thead>
        <tr>
            <th>Pays</th>
            <th>Capitale</th>
        <tr>
    </thead>    
    <tbody>

   <?php

        afficherTableHTML($capitales);
    ?>
 
    </tbody>
</table>
<?php





// Exo 3
echo "<br><br> Exo 3 <br><br>";

echo "<a href='https://elan-formation.eu'target='blank'>Le site du Elan</a>";


// Exo 4
echo "<br><br> Exo 4 <br><br>";



$capitales = ["France" =>"paris", "Allemagne"=>"berlin", "USA"=>"Washington", "Italie"=>"Rome"];



?>
 <table>
    <thead>
        <tr>
            <th>Pays</th>
            <th>Capitale</th>
            <th>Lien Wiki</th>
        <tr>

    </thead>    
    <tbody>
            <?php
            afficherTableHTMLWiki($capitales);
             ?>
    </tbody>
</table>
<?php





// Exo 5
echo "<br><br> Exo 5 <br><br>";

$nomInput = ["Nom", "Prénom", "Ville"];

formPerso($nomInput);


// Exo 6
echo "<br><br> Exo 6 <br><br>";

$elements = ["Monsieur !", "Madame :D", "Mademoiselle ;)"];

Deroul($elements);


// Exo 7
echo "<br><br> Exo 7 <br><br>";

$elements2 = ["Monsieur" => "checked", "Madame" => "", "Mademoiselle" => ""];


genererCheckbox($elements2);


// Exo 8
echo "<br><br> Exo 8 <br><br>";



$url = "http://my.mobirise.com/data/userpic/764.jpg";

afficheN($url, 4);


// Exo 9
echo "<br><br> Exo 9 <br><br>";

genererRadio($elements);

// Exo 10
echo "<br><br> Exo 10 <br><br>";

$champs = ["Nom", "Prénom", "E-mail", "ville"];
$list = ["Homme", "Femme", "Autre"];
$radios = ["Développeur web", "Designer web", "Intégrateur", "Chef de projet"];
?>

<form action="">

<?php
formPerso($champs);
Deroul($list);
genererRadio2($radios);
?>

<button>Valider</button>
</form>
<?php

// Exo 11
echo "<br><br> Exo 11 <br><br>";

// DateTime
$dateNow = new DateTime();
echo $dateNow->format('d/m/Y'), "<br>";
echo $dateNow->format('D d M Y');

//strtotime & setLotcale

$dateTest = strtotime("2019/08/08");


date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_FR.utf8','fra');// OK
echo "Date du test : ", strftime("%A %d %B %Y", $dateTest);

echo'<br>';
// IntlDateFormatter
$bla = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
echo $bla->format(time());

echo'<br>';
echo $bla->format($dateTest);
echo'<br>';
formaterDateFr($dateTest);

// Exo 12
echo "<br><br> Exo 12 <br><br>";

$tableauValeurs=[true, "texte", 10,25.369, ["valeur1", "valeur2" ]];

foreach( $tableauValeurs as $valeur) {
    var_dump($valeur);
}





// Exo 15
echo "<br><br> Exo 15 <br><br>";
?>

<form action="Algo2.php" method="POST">
    <input type="text" name="e-mail" type="email" placeholder="e-mail valide">
    <input type="submit" value="E-mail valide ?">
</form>
<br>
<?php

emailValidator($_POST['e-mail']);

?>
<br><br>
</body>
</html>