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


    public function getOneUser($id){

        $sql = "SELECT id_user, username, PASSWORD, date_inscription
                FROM user
                WHERE id_user = $id";

        $stmt = self::$connexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetch();
    }


    public function addUser($username, $password){

        $sql ="INSERT INTO user(username, date_inscription, password)
        VALUES ('$username', NOW(), '$password')";

        $stmt = self::$connexion->prepare($sql);
        $stmt->execute();


    }





}

