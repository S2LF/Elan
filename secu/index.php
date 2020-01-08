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
        <title>Document</title>
    </head>
    <body>
        <p style="color: red">
            <?php
            if(isset($_GET["error"])){
               switch($_GET['error']){
                case "pwd":
                    echo "Les mots de passes ne sont pas identiques !";
                break;
                case "username":
                    echo "Le pseudo est déjà utilisé !";
                break;
                case "empty":
                    echo "Veuillez remplir tout les champs !";
                break;
                case "regex":
                    echo "Votre mot de passe dois avoir au moins 8 catractères, 1 majuscule et 1 caractère spéciale.";
                break;
                default:
                    echo "Erreur inconnue !";
               }
            }

            ?>
        </p>
        <p style="color:green">
            <?php
                
                if(isset($_GET['success'])){
                    echo "Votre inscription a bien été enregistré !";
                }
            ?>
        </p>
        <h1>
            <?php 
                if(!isset($_SESSION["user"])){
                    echo "CONNECTEZ-VOUS OU INSCRIVEZ-VOUS !";
                    
                }
                else{
                    echo "BIENVENUE ".$_SESSION['user']['username'];
                    echo " <a href='logout.php'>Déconnexion</a>";
                    var_dump($_SESSION);
                }
            ?>
        </h1>

        <h2>Connexion</h2>
        <form method="post" action="connexion.php">
            <input type="text" placeholder="Votre login" name="username"><br>
            <input type="password" placeholder="Votre mot de passe" name="password"><br>
            <input type="hidden" value="<?= $_SESSION['token']?>" name="token">
            <input type="submit" value="Connexion"><i id="loading" class="fas fa-spinner fa-2x fa-spin" style="display: none;"></i>
        </form>

        <h2>Inscription</h2>
        <form action="inscription.php" method="post">
            <input type="text" placeholder="Votre login" name="username"><br>
            <input type="password" placeholder="Votre password"  name="password"><br>
            <input type="password" placeholder="Confirm password"  name="confirm_password"><br>
            <input type="submit" value="Inscription"><i id="loading" class="fas fa-spinner fa-2x fa-spin" style="display: none;"></i>
        </form>


        <script src="https://kit.fontawesome.com/1e5edb27fe.js" crossorigin="anonymous"></script>
        <script
          src="https://code.jquery.com/jquery-3.4.1.min.js"
          integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
          crossorigin="anonymous"></script>
        <script>
            $("form").submit(function(){
                $("#loading").show();
            })
        </script>
    </body>
</html>