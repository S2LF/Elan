<?php
    $produit = $result['data'];
?>
    <article id="produit">
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
        <div>
            <h1><?= $produit['nom_produit']?></h1>
            <p>
                <?= $produit['description_produit']?></p>
            </p>
            <div>
                <h3><?= number_format($produit['prix_produit'], 2, ',', " ")?>&nbsp;€</h3>
                Quantité : <input type="number" id="qtt" min="1" value="1"><a class="addtocart" data-id="<?= $produit['id_produit']?>" href="">Ajouter au panier</a>
            </div>
        </div>
    </article>
    
