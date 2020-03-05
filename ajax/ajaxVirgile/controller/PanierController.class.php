<?php
    require_once "model/PanierModel.class.php";

    class PanierController{

        private $panier;

        public function __construct(){

            if(!isset($_SESSION['panier'])){
                $this->panier = new PanierModel();
            }
            else{
                $this->panier = $_SESSION['panier'];  
            }
        }

        public function indexAction(){

            return array(
                "view" => "view_panier.php",
                "data" => $this->panier
            );
        }

        public function addtocartAction(){

            if(isset($_POST['pid'])){
                $id = $_POST['pid'];
                
                if(isset($_POST["qtt"])){
                    $this->panier->addLine($id, $_POST["qtt"]);
                }
                else $this->panier->addLine($id);
            }

            $_SESSION['panier'] = $this->panier;
            
            return $this->panier->getFullQuantity();
            //cette méthode est appellée en Ajax, donc elle ne doit renvoyer QUE ce qui intéresse Javascript
        }

       /* public function indexAction(){

            if(isset($_POST['pid'])){
                $id = $_POST['pid'];
                
                if(isset($_GET['action'])){
                    switch($_GET['action']){
                        case 'increase':
                            $panier->increaseQuantity($id, 1);
                            break;
                        case 'decrease':
                            $panier->decreaseQuantity($id);
                            break;
                        case 'add' :
                            if(isset($_POST["qtt"])){
                                $panier->addLine($id, $_POST["qtt"]);
                            }
                            else $panier->addLine($id);
                            break;
                        case 'remove' :
                            $panier->removeLine($id);
                            break;
                    }
                }
        
                $_SESSION['panier'] = $panier;
            }
          
            if(isset($_SESSION['panier'])){
                $panier = $_SESSION['panier'];
            }
            else{
                $panier = new Panier();
            }
        }*/
    }