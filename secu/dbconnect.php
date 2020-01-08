<?php
    //connexion à la BDD
    try{
        $connexion = new PDO(
            'mysql:host=localhost:3306;dbname=user',
            'root',
            ''
        );
        $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
        echo $e->getMessage();
    }