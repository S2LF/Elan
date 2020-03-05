<?php    
            foreach($produits as $produit){
?>

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
    <h1><a href="index.php?page=produit&id=<?= $produit['id_produit']?>" data-id="<?= $produit['id_produit']?>"><?= $produit['nom_produit']?></a></h1>
    <p><?= number_format($produit['prix_produit'], 2, ',', " ")?>&nbsp;€</p>
    <p><a data-id="<?= $produit['id_produit']?>" data-act="new" href="">Ajouter au panier</a></p>
    
</article>
<?php
}
?>
