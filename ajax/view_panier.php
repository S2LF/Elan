<?php
if(isset($_SESSION['panier']) && $_SESSION['panier']->getFullQuantity() > 0){
    
    $panier = $_SESSION['panier'];
    ?>
        <div class="flex">
            <h2>Panier : <?= $panier->getFullQuantity() ?></h2>
            <a id="vide" data-act="blitzkrieg" href=""> Vider le panier</a>
        </div>
    
    <hr>
    

        <table id="liste-panier">
            <thead class="bcgGrey">
                <th>Produit</th> 
                <th>Prix unitaire</th>
                <th>Qté</th>
                <th>Prix</th>
            </thead>
            <tfoot class="bcgGrey">
                <tr >
                    <th colspan=2></td>
                    <th>Total </th>
                    <th>Somme</th>  
                </tr>
                <tr >
                    <td colspan=2></td>
                    
                    <td class="center"><?= number_format($panier->getFullQuantity(), 2, ',', ' ') ?></td>
                    <td class="right"><?= number_format($panier->getAmount(), 2, ',', ' ') ?>&nbsp;€</td>
                </tr>
            </tfoot>
            <tbody>
                <?php 
                $panier = $_SESSION['panier'];
                foreach($panier->getLines() as $line){
                ?>
                    <tr>
                        <td><a data-id="<?= $line['produit']['id_produit']?>" 
                            data-act="trash" href="">
                                <i>X</i> <?= $line['produit']['nom_produit'] ?>
                            </a>
                        </td>
                        <td class="right">
                            <?= number_format($line['produit']['prix_produit'], 2, ',', ' ')?>&nbsp;€
                        </td>
                        <td class="center"> 
                            <a data-id="<?= $line['produit']['id_produit']?>" 
                                                data-act="minus" href="">
                                <i >-</i> 
                            </a>
                                <?= $line['quantity'] ?> 
                            <a data-id="<?= $line['produit']['id_produit']?>" 
                                data-act="plus" href="">
                                <i >+</i>
                            </a>
                            
                        </td>
                        <td class="right"><?= number_format($line['quantity']*$line['produit']['prix_produit'], 2, ',', ' ')?>&nbsp;€</td>
                </tr>
            </tbody>
                <?php
                }
                ?>
        </table>

        <script>
        $("td a").on("click", function(event){
            event.preventDefault()
            $.post(
                "controller_panier.php",
                {
                    "pid" : $(this).data("id"),
                    "act": $(this).data("act")
                },

                function(lines){
                    $("#panier")
                        .html(lines)
                }
                        
            )
        })
        $("#vide").on("click", function(event){
            event.preventDefault()
            $.post(
                "controller_panier.php",
                {
                    "act": $(this).data("act")
                },
                function(lines){
                    $("#panier")
                        .html(lines)
                }
            )
        })
        </script>
    <?php
} 
else echo "Le panier est vide !";

?>

    