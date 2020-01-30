<?php
    session_start();

    $_SESSION['token'] = bin2hex(random_bytes(24));
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha256-l85OmPOjvil/SOvVt3HnSSjzF1TUMyT9eV0c2BzEGzU=" crossorigin="anonymous" />
    <link rel="stylesheet" href="public/css/style.css">
    <title>Forum MVC</title>
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
</head>
<body>
    
    <?= var_dump($_SESSION) ?>


    <header>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="index.php?ctrl=User&action=Index">Connexion</a>
            <a href="index.php?ctrl=User&action=IndexRegister">Inscription</a>
        </nav>
    </header>
    
    <main id="shop">
        <?= $page ?>
    </main>
   
</body>
</html>