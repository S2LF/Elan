<?php

    class Controller{

        private $connexion;
        private $user;
        
        public function __construct($connexion){
            $this->connexion = $connexion;
        }

        public function getUser($form_username){
            try{
                $sql = "SELECT username, password 
                    FROM user 
                    WHERE username = :name";

            //préparation de la requète dans le serveur       
                $stmt = $this->connexion->prepare($sql);
            //injection des paramètres
                $stmt->bindParam("name", $form_username);
            //execution
                $stmt->execute();
            //on récupère l'utilisateur en base de données
                $this->user = $stmt->fetch();
                return $this->user;
            }
            catch(Exception $e){
                return $e->getMessage();
            }
        }

        
        public function newUser($form_new_username, $form_new_password){
            try{
                    $sql = "INSERT INTO user(username, password)
                        VALUE (:name, :password)";

                //préparation de la requète dans le serveur       
                    $stmt = $this->connexion->prepare($sql);
                //injection des paramètres
                    $stmt->bindParam("name", $form_new_username);
                    $stmt->bindParam("password", $form_new_password);
                //execution
                    $stmt->execute();
            }
            catch(Exception $e){
                return $e->getMessage();
            }
        }


        public function verifyPassword($form_password){
            sleep(1);
            return password_verify($form_password, $this->user['password']);
        }
    }