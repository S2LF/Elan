<?php

    abstract class Model{

        protected static $connexion;
        
        protected static function dbconnect(){
            //connexion à la BDD
            try{
                self::$connexion = new PDO(
                    'mysql:host=localhost:3306;dbname=forum',
                    'root',
                    '',
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
                );
                self::$connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }
    }