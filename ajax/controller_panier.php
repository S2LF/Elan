<?php
    require_once("Panier.class.php");
    //require_once("dbconnect.php");

    session_start();

    if(isset($_POST['pid'])){
        $id = $_POST['pid'];
        $act = $_POST['act'];

        if(!isset($_SESSION['panier'])){
            $panier = new Panier($id);
        }else{
            $panier = $_SESSION['panier'];
            switch ($act) {
                case 'new':
                    $panier->addLine($id);
                break;
                case 'plus':
                    $panier->increaseQuantity($id);
                break;
                case 'minus':
                    $panier->decreaseQuantity($id);
                break;
                case "trash":
                    $panier->removeLine($id);
                break;
            }
        }
        $_SESSION['panier'] = $panier;
        
    }else if(isset($_POST['act'])){
        $panier = $_SESSION['panier'];
        $act = $_POST['act'];
        if($act == "blitzkrieg"){
            $panier->removeLine();
        } 
   }
    


    // if(isset($_POST['plusid'])){
    //     $plus_id = $_POST['plusid'];
    //     $panier = $_SESSION['panier'];

    //     $_SESSION['panier'] = $panier;
    // }

    include "view_panier.php";
?>
