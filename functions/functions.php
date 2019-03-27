<?php 

	/***** HELPER FUNCTION *****/

	function clean($string){
		return htmlentities($string);
	}

	function redirect($location){
		return header("Location: {$location}");
	}

	function set_message($message){
		if(!empty($message)){
			$_SESSION['message'] = $message;
		}else{
			$message = "";
		}
	}

	function display_message(){
		if(isset($_SESSION['message'])){
			echo $_SESSION['message'];

			unset($_SESSION['message']);
		}
	}

	function token_generator(){
		$token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));
		return $token;
	}

	/***** VALIDATION FUNCTION *****/

	function validate_user_registration(){

		$errors = [];
		$min = 3;
		$max = 20;

		if($_SERVER['REQUEST_METHOD'] == "POST"){
			
			$first_name = clean($_POST['first_name']);
			$last_name = clean($_POST['last_name']);
			$username = clean($_POST['username']);
			$email = clean($_POST['email']);
			$password = clean($_POST['password']);
			$confirm_password = clean($_POST['confirm_password']);

			if(strlen($first_name) < $min){
				$errors[] = "First name cannot be less than {$min} characters";
			}

			if(strlen($first_name) > $max){
				$errors[] = "First name cannot be more than {$max} characters";
			}

			if(strlen($last_name) > $max){
				$errors[] = "Last name cannot be more than {$max} characters";
			}

			if(strlen($username) < $min){
				$errors[] = "Username cannot be less than {$min} characters";
			}

			if(strlen($username) > $max){
				$errors[] = "Username cannot be more than {$max} characters";
			}

			if(strlen($email) > $max){
				$errors[] = "Email cannot be more than {$max} characters";
			}

			if($password !== $confirm_password){
				$errors[] = "Password does not match";
			}

			if(!empty($errors)){
				foreach ($errors as $error) {
					
				$message = <<<DELIMITER

					<div class="alert alert-danger alert-dismissible" role="alert">
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    						<span aria-hidden="true">&times;</span></button>
    						<strong>Warning</strong> $error
					</div>
DELIMITER;
					echo $message;
				}
			}
		}
	}

?>