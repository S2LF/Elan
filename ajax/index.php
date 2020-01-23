<?php

    require_once("dbconnect.php");
     
    $sql = "SELECT * FROM produit";
     
    $stmt = $connexion->query($sql);
     
    $produits = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha256-l85OmPOjvil/SOvVt3HnSSjzF1TUMyT9eV0c2BzEGzU=" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
    <title>Shop</title>
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous">
    </script>

</head>
<body>
    <h3 id="message"></h3>
    <p id="loader">Loading</p>
    <main id="shop">
        
        <section id="produits">
    
        <?php    
            foreach($produits as $produit){
                include "produit.php";
            }
        ?>
        </section>
        <aside id="panier">

                <?php include "controller_panier.php";?>

        </aside>
    </main>

    <script>

        $("article a").on("click", function(event){
            event.preventDefault()
            $("#loader").fadeIn(500)
            $.post(
                "controller_panier.php",
                {
                    "pid" : $(this).data("id"),
                    "act" : $(this).data("act")
                },
                function(lines){
                    $("#loader").fadeOut(500)
                
                    //let lines = JSON.parse(response)
                   
                    $("#panier")
                        .html(lines+"<br>")
                    $("#message")
                        .hide()
                        .html("Le produit a bien été ajouté au panier")
                        .fadeIn(500)
                        .fadeOut(1000)
                }
            )
        })
 


    
    </script>
</body>
</html>