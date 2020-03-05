<?php
    require_once "model/ProduitModel.class.php";

    class ProduitController{

        public function indexAction(){

            $model = new ProduitModel();

            $produits = $model->getAllProduits();

            return array(
                "view" => 'view_produits.php',
                "data" => $produits
            );
        }

        public function viewAction($id){
            
            $model = new ProduitModel();

            $produit = $model->getOneProduit($id);

            return array(
                "view" => 'view_produit.php',
                "data" => $produit
            );

        }
    }