<?php

$table = $_GET["table"];

$title = 'Table de Multiplication'; 

ob_start();
?>
<table>
    <tbody>
<?php
        if (isset($table)) {
            if (!empty($table) && is_numeric($table)){
                for($i=1; $i<=10; $i++){
                    echo "<tr><td> $i x $table = ". $i*$table ."</td></tr>";
                }
            } else {
                echo "Veuillez rentrer une nombre !";
            }
        }
?>
    </tbody>
</table>
<?php
$content = ob_get_clean();

require ('template/template.php');

