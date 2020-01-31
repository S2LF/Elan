<?php 

    require_once MODEL_PATH.'Model.class.php';

class UserModel extends Model {

    public function __construct(){
        parent::dbConnect();
    }
    
    public function getListUsers(){

        $sql = "SELECT id_user, username, PASSWORD, date_inscription
                FROM user";

        $stmt = self::$connexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }


    public function getOneUser($username){

        $sql = "SELECT id_user, username, PASSWORD, date_inscription
                FROM user
                WHERE username = '$username' ";

        $stmt = self::$connexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetch();
    }


    public function addUser($username, $password){

        $sql ="INSERT INTO user(username, password, date_inscription)
        VALUES ('$username', :password, NOW())";

        $stmt = self::$connexion->prepare($sql);
        $stmt->bindParam("password", $password);
        $stmt->execute();

    }





}

