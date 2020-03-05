<?php
    $panier = $result['data'];
?>

<h2>Panier : <?= $panier->getFullQuantity()?></h2>
<hr>
<?php
    if($panier->getFullQuantity() == 0){ 
        echo "Le panier est vide !";
    } 
    else{
    ?>

    <table id="liste-panier">
        
        <?php 

            foreach($panier->getLines() as $line){
                ?>
                <tr>
                    <td>
                        <button class="plus" data-id="<?= $line['produit']['id_produit']?>">+</button>
                    </td>
                    <td><?= $line['quantity']?></td>
                    <td>
                        <button class="minus" data-id="<?= $line['produit']['id_produit']?>">-</button>
                    </td>
                    <td><?= $line['produit']['nom_produit']?></td>
                    <td><?= $line['produit']['prix_produit']*$line['quantity'] ?> €</td>
                    <td><button class="remove" data-id="<?= $line['produit']['id_produit']?>">&times;</button></td>
                </tr>
                <?php
            }
        ?>
    </table>
    <p id="amount">
        Total : <?= $panier->getAmount()?> €
        <button class="remove">Vider le panier</button>
    </p>
  
<?php
    }
?>