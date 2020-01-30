<?php 

    require_once MODEL_PATH.'Model.class.php';

class TopicModel extends Model {

    public function __construct(){
        parent::dbConnect();
    }
    
    public function getListTopics(){

        $sql = "SELECT id_topic, title, creation_date, topic.id_user, username 
                FROM topic, user 
                WHERE topic.id_user = user.id_user";

        $stmt = self::$connexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }


    public function getOneTopic($id){

        $sql = "SELECT title, id_topic
                FROM topic
                WHERE topic.id_topic = $id";

        $stmt = self::$connexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetch();

    }
    

    public function addTopic($title, $creation_date){

        $sql ="INSERT INTO topic(title, creation_date)
                VALUES ($title, $creation_date)";
    
        $stmt = self::$connexion->prepare($sql);
        $stmt->execute();
        
    

    }


}

