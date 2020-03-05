<article>
    <figure>
        <?php
            echo "<img src='img/";
            if($produit['img_produit']){
                echo $produit['img_produit'];
            }
            else echo "default.png";
            echo "'>";
        ?>
    </figure>
    <h1><?= $produit['nom_produit']?></h1>
    <p><?= number_format($produit['prix_produit'], 2, ',', " ")?>&nbsp;€</p>
    <p><a data-id="<?= $produit['id_produit']?>" data-act="new" href="">Ajouter au panier</a></p>
    
</article>