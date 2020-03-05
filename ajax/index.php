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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />
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
        <?php
        if(!isset($_GET['id'])){
        ?>
            <section id="produits">
                <?php    
                    include "views/view_produits.php";
                ?>
            </section>
            <aside id="panier">

                    <?php include "controller_panier.php";?>

            </aside>
        <?php
        }else{
        ?>
            <section id="produits">
                <?php    
                    include "views/view_produit?id=?.php";
                ?>
            </section>
            <aside id="panier">

                    <?php include "controller_panier.php";?>

            </aside>

        <?php
        }
        ?>


    </main>

    <script>



        // Clic sur le nom du produit
        $("h1 a").on('click', function(event){
            
            $.post(
                "ProduitController.php",
                {
                    "pid" : $(this).data("id")
                }
            )
            
        })




        // Clic sur "Ajouter au panier"
        $("article p a").on("click", function(event){
            event.preventDefault()
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