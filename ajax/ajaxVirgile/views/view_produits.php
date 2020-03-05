<?php
    $produits = $result['data'];
?>
<section id="produits">
    
    <?php    
        foreach($produits as $produit){
            ?>
            <article>
                <figure>
                    <?php
                        echo "<img width=150 src='./public/img/";
                        if($produit['img_produit']){
                            echo $produit['img_produit'];
                        }
                        else echo "default.png";
                        echo "'>";
                    ?>
                </figure>
                <h1><?= "<a href='index.php?ctrl=produit&action=view&id=".$produit['id_produit']."'>".$produit['nom_produit']."</a>";?></h1>
                <p><?= number_format($produit['prix_produit'], 2, ',', " ")?>&nbsp;€</p>
                <p><a class="addtocart" data-id="<?= $produit['id_produit']?>" href="">Ajouter au panier</a></p>
            </article>
    
            <?php
        }
    ?>
</section>