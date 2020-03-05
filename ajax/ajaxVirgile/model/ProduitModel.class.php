<?php
    require_once("model/Model.class.php");

    class ProduitModel extends Model{

        public function __construct(){
            parent::__construct();
        }

        public function getAllProduits($sortField = 'nom_produit', $sortMethod = 'ASC'){
            $sql = "SELECT * FROM produit ORDER BY :field :method";
     
            $stmt = $this->connexion->prepare($sql);
            $stmt->execute(['field' => $sortField, 'method' => $sortMethod]);
           
            return $stmt->fetchAll();
        }

        public function getOneProduit($id){
            $sql = "SELECT * FROM produit WHERE id_produit = ?";
     
            $stmt = $this->connexion->prepare($sql);
            $stmt->execute([$id]);
            
            return $stmt->fetch();
        }


    }