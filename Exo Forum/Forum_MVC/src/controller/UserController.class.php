<?php
	require_once CTRL_PATH."ControllerInterface.class.php";
	require_once MODEL_PATH."UserModel.class.php";


	class UserController implements ControllerInterface{
		
		public function indexAction(){

			return array(
				"view" => "viewConnect.php"
			);
        }

        public function indexRegisterAction(){
            return array(
                "view" => "viewRegister.php"
            );  
        }


        public function addUserAction(){

            $username = $_POST['username'];
            $pass = $_POST['password'];
            $confirm = $_POST['confirm_password'];

            $model = new UserModel();
            $model->addUser($username, $pass);

            header('Location:index.php');
        }


    }