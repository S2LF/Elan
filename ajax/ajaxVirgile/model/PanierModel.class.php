<?php

    class PanierModel{

        private $lines = [];

        private function connectBDD(){
            try{
                $connexion = new PDO(
                    'mysql:host=localhost:3306;dbname=shop',
                    'root',
                    '',
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
                );
                $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                return $connexion;
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }

        public function addLine($id, $qtt = null){
            if(!$qtt){
                $qtt = 1;
            }
            if(!array_key_exists($id, $this->lines)){
                
                $connexion = $this->connectBDD();

                $sql = "SELECT id_produit, nom_produit, prix_produit 
                    FROM produit 
                    WHERE id_produit = ?";
                
                $stmt = $connexion->prepare($sql);

                $stmt->execute(array($id));

                $produit = $stmt->fetch();
                $this->lines[$id] = ["produit" => $produit, "quantity" => $qtt];
            }
            else $this->increaseQuantity($id, $qtt);

        }

        public function getLines(){
            return $this->lines;
        }

        public function removeLine($id = null){
            if(!$id){
                $this->lines = [];
            }
            else{
                unset($this->lines[$id]);
            }
        }

        public function increaseQuantity($id, $qtt){
            $this->lines[$id]["quantity"] = $this->lines[$id]["quantity"]+$qtt;
        }

        public function decreaseQuantity($id){
            if($this->lines[$id]["quantity"] > 1){
                $this->lines[$id]["quantity"]--;
            }
            else $this->removeLine($id);
        }

        public function getAmount(){
            
            $amount = array_map(function($line){
                return $line['produit']['prix_produit']* $line['quantity'];
            }, $this->lines);

            return array_sum($amount);
        }

        public function getFullQuantity(){
            $fullqtt = 0;
            foreach($this->lines as $line){
                $fullqtt+= $line['quantity'];
            }
            return $fullqtt;
        }
    }