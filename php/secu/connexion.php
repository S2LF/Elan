<?php
    require_once("dbconnect.php");
    require_once("Controller.php");

    session_start();

    $controller = new Controller($connexion);

    $user = $controller->getUser($_POST['username']);

    if(
        is_array($user) &&
        $controller->verifyPassword($_POST['password']) && 
        hash_equals($_SESSION['token'], $_POST['token'])
    ){
        $_SESSION['user'] = $user;
        header("Location:index.php");
    }
    else header("Location:index.php?error");


