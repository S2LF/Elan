<?php 

    require_once MODEL_PATH.'Model.class.php';

class MessageModel extends Model {

    public function __construct(){
        parent::dbConnect();
    }
    
    public function getListMessageFromTopic($id){

        $sql = "SELECT id_message, text, creation_date, message.id_user, username
                FROM message, user
                WHERE message.id_user = user.id_user
                AND id_topic = $id
                ORDER BY creation_date DESC";

        $stmt = self::$connexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function addMessage($text,$id_user, $id_topic){

        $sql ="INSERT INTO message(text, creation_date, id_user, id_topic)
                VALUES ('$text', NOW(), $id_user, $id_topic)";

        $stmt = self::$connexion->prepare($sql);
        $stmt->execute();
        // $affectedLines = $message->execute(array($text, $id_user, $id_topic));
        
    }

    public function deleteMessage($id){
        $sql ="DELETE FROM message
        WHERE id_message = $id";

        $stmt = self::$connexion->prepare($sql);
        $stmt->execute();

        }


    public function updateMessage($id_message, $new_text){
        $sql ="UPDATE message
               SET text = '$new_text'
               WHERE message.id_message = $id_message";

        $stmt = self::$connexion->prepare($sql);
        $stmt->execute();
    }


}

