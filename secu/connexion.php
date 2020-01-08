<?php
    require_once("dbconnect.php");
    require_once("Controller.php");

    session_start();

    $controller = new Controller($connexion);

    $userFiltred = filter_input( INPUT_POST, 'username', FILTER_SANITIZE_STRING);

    $user = $controller->getUser($userFiltred);
    $password = 
    $token = $_POST['token']
    
    $username = filter_input( INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_POST, 'password', FILTER_VALIDATE_REGEXP, [
        "options" => [
            "regexp" => "#^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$#"
        ]
    ])
    $passConfirm = filter_input(INPUT_POST, 'confirm_password', FILTER_VALIDATE_REGEXP, [
        "options" => [
            "regexp" => "#^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$#"
        ]
    ])


    if( is_array($user) ) {
            if ($controller->verifyPassword($_POST['password'])) {
                 if (hash_equals($_SESSION['token'], $_POST['token'])){

                 } else {
                    $_SESSION['user'] = $user;
                    header("Location:index.php");
                 }
            } else {
                
            }
    } else header("Location:index.php?error");


