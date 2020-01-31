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

        public function getConnectAction(){

            $token = $_POST['token'];

            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $model = new UserModel();
            $existUser = $model->getOneUser($username);

            if ( is_array($existUser)) {

                $_SESSION['user'] = $existUser;

                header('Location: index.php');
            }
        }

        public function getDisconnectAction(){


                session_start();
                unset($_SESSION['user']);

                header("Location:index.php");

        }


        public function addUserAction(){

            // Récupérer et filtrer les username et password en POST
            // $username = $_POST['username'];
            // $pass = $_POST['password'];
            // $confirm = $_POST['confirm_password'];

            $username= filter_input( INPUT_POST, 'username', FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
            $pass = filter_input(INPUT_POST, 'password', FILTER_VALIDATE_REGEXP, [
                "options" => [
                    "regexp" => "#^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$#"
                ]
            ]);
            $passConfirm = filter_input(INPUT_POST, 'confirm_password', FILTER_VALIDATE_REGEXP, [
                "options" => [
                    "regexp" => "#^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$#"
                ]
            ]);

            $model = new UserModel();
            
            // 1 Les champs sont vides ou pas ?
            if($username !== "" && $pw !== ""){
                // 2 Username déjà existant ?
                if($model->getOneUser($username) == false){
                    //  3 Pass = Pass confirm
                    if( $pass == $passConfirm ){
                        // 4 REGEX
                        if($pass){
                            password_hash($pass, PASSWORD_ARGON2I);

                            $model->addUser($username, password_hash($pass, PASSWORD_ARGON2I));
                
                            header('Location:index.php?success');
                        } else {
                            //4
                            header("Location: index.php?error=regex");
                        }
                    } else {
                        // 3
                        header("Location: index.php?error=pwd");
                    }
                } else {
                    // 2 
                    header("Location: index.php?error=username");
                }
            } else {
                // 1
                header("Location: index.php?error=empty");
            }


        }


    }