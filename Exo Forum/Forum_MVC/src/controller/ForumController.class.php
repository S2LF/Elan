<?php
	require_once CTRL_PATH."ControllerInterface.class.php";
	require_once MODEL_PATH."TopicModel.class.php";
	require_once MODEL_PATH."MessageModel.class.php";


	class ForumController implements ControllerInterface{
		
		public function indexAction(){
						
			$model = new TopicModel();
			$topics = $model->getListTopics();

			return array(
				"view" => "viewTopics.php",
				"data" => $topics
			);
		}

		public function viewOneTopicAction($id){

			$model = new TopicModel();
			$messages = new MessageModel();

			$topic = $model->getOneTopic($id);
			$listMessage = $messages->getListMessageFromTopic($id);

			return array(
				"view" => "viewOneTopic.php",
				"data" => [ 
					"topic" => $topic,
					"messages" => $listMessage
				]
			);

		}
// CRUD Message
		public function createMessageAction(){

			$text = $_POST['message'];
			
 			$id_user = 3;
			
			$id_topic = $_GET['id'];



			$model = new MessageModel();
			$model->addMessage($text, $id_user, $id_topic);
			header("Location:index.php?ctrl=Forum&action=viewOneTopic&id=$id_topic"); 
		}

		public function updateMessageAction(){
			
			$id_message = $_POST['id_message'];
			$new_text = $_POST['new_text'];
			$id_topic = $_GET['id'];

			$model = new MessageModel();
			$model->updateMessage($id_message, $new_text);


			header("Location:index.php?ctrl=Forum&action=viewOneTopic&id=$id_topic");

		}

		public function deleteMessageAction(){

			$id = $_POST['id_message'];
			$id_topic = $_GET['id'];
			$id_mess = $_GET['idMess'];

			$model = new MessageModel();
			$model->deleteMessage($id_mess);
			

			header("Location:index.php?ctrl=Forum&action=viewOneTopic&id=$id_topic"); 
		}

// CRUD Topic

		public function createTopicAction(){

			$title = $_POST['title'];
			
			$id_user = 3;
			

			$model = new TopicModel();
			$model->addTopic($title, $id_user);
			header("Location:index.php"); 
		}




		public function deleteTopicAction(){

			
			$id_topic = $_GET['id'];

			$model = new TopicModel();
			$model->deleteTopic($id_topic);



			header("Location:index.php");
		}


	}