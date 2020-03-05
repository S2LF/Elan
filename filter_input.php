<?php
    var_dump(filter_input(INPUT_POST, "mail", FILTER_VALIDATE_EMAIL));
   
    var_dump(filter_input(INPUT_POST, "pass", FILTER_VALIDATE_REGEXP, [
        "options" => [
            "regexp" => "#^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$#"
        ]
    ]));
?>
<form action="test.php" method="post" enctype="multipart/form-data">
    Mail : <input type="email" name="mail"><br>
    Mot de passe : <input type="password" name="pass"><br>
    <input type="submit" value="Go">
</form>
    