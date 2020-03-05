<?php

    class Model{

        public $connexion;
        
        public function __construct(){
            //connexion à la BDD
            try{
                $this->connexion = new PDO(
                    'mysql:host=localhost:3306;dbname=shop',
                    'root',
                    '',
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
                );
                $this->connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }
    }