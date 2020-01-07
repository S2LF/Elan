<?php
    require_once("dbconnect.php");
    require_once("Controller.php");

    session_start();

    $controller = new Controller($connexion);

    $username = $_POST['username'];
    $pw = $_POST['password'];

    if(
        $controller->getUser($_POST['username']) == false 
    ){
        if($username !== "" && $pw !== ""){
            if( $pw === $_POST['confirm_password']){              
                $controller->newUser($username, password_hash($pw, PASSWORD_ARGON2I));
                header("Location:index.php?success");
            } else {
                header("Location:index.php?error=pwd");
            }
        } else {
            header("Location:index.php?error=empty");
        }

    }
    else header("Location:index.php?error=username");


