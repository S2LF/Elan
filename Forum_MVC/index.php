<?php  
    define("BASE_PATH", "src/");
    define("CTRL_PATH", BASE_PATH."controller/");
    define("MODEL_PATH", BASE_PATH."model/");
    define("VIEW_PATH", "views/");

    //index.php?ctrl=????&action=????&id=??

    session_start();

    if(isset($_GET["ctrl"])){
        $ctrl = $_GET["ctrl"];
    }
    else $ctrl = "Forum";

    $ctrlname = $ctrl."Controller"; 
    $ctrlpath = CTRL_PATH.$ctrlname.".class.php";

    if(!file_exists($ctrlpath)){
        $ctrlname = "ForumController"; 
        $ctrlpath = CTRL_PATH."ForumController.class.php";
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
        include(VIEW_PATH.$result['view']);
        /*je mets cet affichage dans une variable*/
        $page = ob_get_contents();
        /*j'efface le tampon*/
        ob_end_clean();
        /*j'affiche le template principal*/
        include VIEW_PATH."layout.php";
    }
?>
