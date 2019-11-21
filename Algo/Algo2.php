<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

// Exo 1
echo "<br><br> Exo 1 <br><br>";


$texte = "Mon texte en paramètres";

function convertMajRouge($arg) {
    
    $arg= mb_strtoupper($arg);
    echo '<span style="color:red;">'.$arg.'</span>';

}

convertMajRouge($texte);

// Exo 2
echo "<br><br> Exo 2 <br><br>";


$capitales = ["France" =>"paris", "Allemagne"=>"berlin", "USA"=>"Washington", "Italie"=>"Rome"];


function afficherTableHTML($capitales) {
ksort($capitales)
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
        foreach($capitales as $pays=>$capitale) {
            echo "<tr>
                    <td>".mb_strtoupper($pays)."</td>
                    <td>".ucfirst($capitale)."</td>
                  </tr>";

        } ?>
    </tbody>
</table>
<?php
}

afficherTableHTML($capitales)

?>



</body>
</html>

