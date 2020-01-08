<?php
    require_once("dbconnect.php");
    require_once("Controller.php");

    session_start();

    $controller = new Controller($connexion);

    $username= filter_input( INPUT_POST, 'username', FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
    $pass = filter_input(INPUT_POST, 'password', FILTER_VALIDATE_REGEXP, [
        "options" => [
            "regexp" => "#^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$#"
        ]
    ]);
    $passConfirm = filter_input(INPUT_POST, 'confirm_password', FILTER_VALIDATE_REGEXP, [
        "options" => [
            "regexp" => "#^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$#"
        ]
    ]);;

    if(
        $controller->getUser($username) == false 
    ){
        if($pass){
            if($username !== "" && $pw !== ""){
                if( $pass === $passConfirm){              
                    $controller->newUser($username, password_hash($pass, PASSWORD_ARGON2I));
                    header("Location:index.php?success");
                } else {
                    header("Location:index.php?error=pwd");
                }
            } else {
                header("Location:index.php?error=empty");
            }

        } else {
            header("Location:index.php?error=regex");
        }
    }
    else header("Location:index.php?error=username");


