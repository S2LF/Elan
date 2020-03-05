<?php  
    require_once "model/PanierModel.class.php";
    session_start();

    if(isset($_GET["ctrl"])){
        $ctrl = $_GET["ctrl"];
    }
    else $ctrl = "Produit";

    $ctrlname = $ctrl."Controller"; 
    $ctrlpath = "controller/".$ctrlname.".class.php";

    if(!file_exists($ctrlpath)){
        $ctrlname = "ProduitController"; 
        $ctrlpath = "ProduitController.class.php";
    }
    require $ctrlpath;

    $controller = new $ctrlname();

    if(isset($_GET["action"])){
        $action = $_GET["action"];
    }
    else $action = "index";

    $method = $action.'Action';

    if(!method_exists($controller, $method)){
        $method = "indexAction";
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    else $id = null;
    
    $result = $controller->$method($id);

    /*--------CHARGEMENT PAGE----------*/	
	
    if(isset($_GET['ajax'])){
        echo $result;
    }
    else{
        ob_start();//démarre un buffer (tampon de sortie)
        /*la vue s'affiche dans le buffer qui devra être inséré
        au milieu du template*/
        include("views/".$result['view']);
        /*je mets cet affichage dans une variable*/
        $page = ob_get_contents();
        /*j'efface le tampon*/
        ob_end_clean();
        /*j'affiche le template principal*/
        include "views/layout.php";
    }
?>
