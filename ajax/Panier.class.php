<?php
    
    class Panier{

        private $lines = array();
        
        //["id" => ["produit" => array, "quantite" = X], ["id" => ["produit" => array, "quantite" = X]]

        public function __construct($id){

            $this->addLine($id);
        }

        private function connectBDD(){
            //connexion à la BDD
            try{
                $connexion = new PDO(
                    'mysql:host=localhost:3306;dbname=shop',
                    'root',
                    ''
                );
                $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                return $connexion;
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }

        // Si la ligne n'existe pas, rajoute là. Si la ligne existe, augmente sa quantité de 1

        public function addLine($id){
            $bdd = $this->connectBDD();

            $sql = "SELECT id_produit, nom_produit, prix_produit 
                FROM produit 
                WHERE id_produit = ?";
            
            $stmt = $bdd->prepare($sql);

            $stmt->execute(array($id));

            $produit = $stmt->fetch();

            if(!array_key_exists($id, $this->lines)){
                $this->lines[$id] = ["produit" => $produit, "quantity" => 1];
            }
            else $this->increaseQuantity($id);

        }

        public function getLines(){
            return $this->lines;
        }

        public function removeLine($id = null){
            if($id){
                unset($this->lines[$id]);
            }
            else{
                $this->lines = [];
            }
        }

        public function increaseQuantity($id){
            $this->lines[$id]["quantity"]++;
        }

        public function decreaseQuantity($id){
            if($this->lines[$id]["quantity"]>1){
                $this->lines[$id]["quantity"]--;
            }else{
                $this->removeLine($id);
            }
        }

        public function getAmount(){
            $total = 0;

            foreach($this->lines as $line){
                $prix_unitaire = $line['produit']["prix_produit"];
                $qtt = $line    ["quantity"];
                $prix = $prix_unitaire*$qtt;

                $total += $prix;
            }

            return $total;
        }

        public function getFullQuantity(){
            $fullQtt = 0;
            foreach($this->lines as $line){
                $fullQtt+= $line['quantity'];
            }
            return $fullQtt;
        }
    }