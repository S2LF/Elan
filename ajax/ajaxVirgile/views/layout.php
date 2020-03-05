<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Shop</title>
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
</head>
<body>
    <h3 id="message"></h3>
    <header>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="index.php?ctrl=panier">Panier 
                (<span id="nbcart">
                <?php
                    if(isset($_SESSION['panier'])){
                        
                        echo $_SESSION['panier']->getFullQuantity();
                    }
                    else echo 0;
                ?>
                </span>)
            </a>
        </nav>
    </header>
    
    <main id="shop">
        <?php
            echo $page;
        ?>
    </main>
    
    <script>

        $(document).ready(function(){
            //activation des events clicks sur les boutons du panier
            //bindClicks()
            $("article a.addtocart").on("click", function(event){
                event.preventDefault()
                let qtt = 1
                if($(this).siblings("#qtt").length > 0){
                    qtt = $(this).siblings("#qtt").val()
                }
                $.post(
                    "index.php?ctrl=panier&action=addtocart&ajax=true",
                    {
                        "pid" : $(this).data("id"),
                        "qtt" : qtt
                    },
                    function(result){
                        $("#nbcart").html(result) 
                        $("#message")
                            .hide()
                            .html("Le produit a bien été ajouté au panier")
                            .fadeIn(500)
                            .delay(3000)
                            .fadeOut(500) 
                    }
                )
                 
            })
        })
        /*function bindClicks(){
            $(".plus").on("click", function(){
                ajaxCall("increase", $(this).data("id"))
            })

            $(".minus").on("click", function(){
                ajaxCall("decrease", $(this).data("id"))
            })

            $(".remove").on("click", function(){
                if(!$(this).data('id')){
                    if(confirm("Etes-vous sûr de vouloir vider entièrement le panier?")){
                        ajaxCall("remove", null)
                    }
                }
                else ajaxCall("remove", $(this).data('id'))
            })
        }*/

        


    </script>
</body>
</html>