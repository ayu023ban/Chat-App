<?php include('connect.php');
session_start();
$username = test_input($_POST['username']);
$password = test_input($_POST['password']);
$remember_me = isset($_POST['remember_me']);
$error_username_login = "";
$error_password_login = "";
$error_button = "";
$is_correct_values = true;
function test_input($test_data){
	$data = trim($test_data);
  	$data = stripslashes($test_data);
 	$data = htmlspecialchars($test_data);
  	return $test_data;
}

	if(isset($_POST['login'])){
		if(!isset($username)){
			$error_username_login = "username cannot be empty";
			$is_correct_values = false;
		}
		else if(!isset($password)){
			$error_user_login = "password cannot be empty";
			$is_correct_values = false;
		}

		if($is_correct_values){
			$password = sha1($password);
			$sql = "select * from ayush_user where username = '{$username}' and password = '{$password}'";
			$result_login = $conn->query($sql);
			if($result_login->num_rows > 0){
				$row = $result_login->fetch_assoc();
				$_SESSION['id'] = $row["id"];
				echo "you have successfully loged in";
			}
			else{
				$error_button = "Your email or password is incorrect";
				
			}
		}
		else{
			$error_button = "some unexpected error occured";
		}
	}


?>
