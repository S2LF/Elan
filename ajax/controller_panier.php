<?php
    require_once "Panier.class.php";
    //require_once("dbconnect.php");

    session_start();

    if(isset($_SESSION['panier'])){
        $panier = $_SESSION['panier'];
    }
    else{
        $panier = new Panier();
    }

    if(isset($_POST['pid'])){
        $id = $_POST['pid'];
        $act = $_POST['act'];

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
    else if(isset($_POST['act'])){
        
        $act = $_POST['act'];
        if($act == "blitzkrieg"){
            $panier->removeLine();
        } 
   }

   $_SESSION['panier'] = $panier;

 
    include "views/view_panier.php";
?>
