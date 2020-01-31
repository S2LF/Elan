


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
    

    <header>
        <nav class="flex">
            <a href="index.php">Accueil</a>
            <div>
            <?php 
            if(! isset($_SESSION['user'])){
            ?>
            
                <a href="index.php?ctrl=User&action=Index">Connexion</a>
                <a href="index.php?ctrl=User&action=IndexRegister">Inscription</a>
            <?php
            } else {

                if( isset($_SESSION['user'])){
                    echo "<span id='hello'> Hello ".$_SESSION['user']['username']."</span>";
                } ?>
                <a id="logout" href="index.php?ctrl=User&action=getDisconnect">Se déconnecter</a>
            <?php
            }
            ?>

            <p>



            </p>
            </div>
        </nav>
    </header>
    
    <main id="shop">
        <?= $page ?>
    </main>
   

    <script>
            $("form").submit(function(){
                $("#loading").show();
            })

            $("#logout").on('click', function(evt){
                evt.preventDefault()
                if(confirm('Vous allez être déconnecté. Continuer ?')){
                     $( location ).attr("href", $('#logout').attr("href"))
                }

            })


            $("#delete").on('click', function(evt){
                evt.preventDefault()
                if(confirm('Etes-vous sûre de vouloir supprimer cela ?')){
                    $( location ).attr("href", $('#delete').attr("href"))
                }
            })

            $("#update").on('click', function(evt){
                evt.preventDefault()
                $('#updateSpace').css("display","initial")
            })
    </script>



</body>
</html>