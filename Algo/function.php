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




function emailValidator($email) {

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "L'adresse email ''$email'' est considérée comme valide.<br><br>";
    } else {
        echo "L'adresse email ''$email'' est considérée comme invalide.<br><br>";
    }  

}
