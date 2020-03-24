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
			//$password = sha1($password);
			$sql = "select * from ayush_user where username = '{$username}' limit 1";
			$result_login = $conn->query($sql);
			if($result_login->num_rows > 0){
				$row = $result_login->fetch_assoc();
				if(password_verify($password,$row['password'])){
					$_SESSION['id'] = $row["id"];
					echo "you have successfully loged in";
					if($remember_me){
						$cookie_id = rand();
						$cookie_id_hash = password_hash($cookie_id , PASSWORD_DEFAULT);
						setcookie("id",$cookie_id,time()+30*24*60*60);
						$sql = "insert into ayush_session (session_id , cookie_id) values ( '{$row['id']}' , '$cookie_id_hash' )";
						if($conn->query($sql)===true){
							echo "remembered successfully";
						}
					}
				}
				else{
					$error_button ="Your password is incorrect";
				}
			}
			else{
				$error_button = "Your username doesnot exists";
				
			}
		}
		else{
			$error_button = "some unexpected error occured";
		}
	}

echo isloggedin($conn);
function isloggedin($conn){
	if(isset($_SESSION['id'])){
		$sql = "select * from ayush_user where id = '{$_SESSION['id']}' limit 1 ";
		$result_query = $conn->query($sql);
		if($result_query->num_rows > 0){
			return true;
		}
		else {
			return false;
		}
}
else if(isset($_COOKIE['id'])){
	$cookie_id_hash = password_hash($_COOKIE['id'],PASSWORD_DEFAULT);
	$sql = "select * from ayush_session where cookie_id = '{$cookie_id_hash}' ";
	$result_query = $conn->query($sql);
	if($result_query->num_rows>0){
		$row = $result_query->fetch_assoc();
		$_SESSION['id']=$row['session_id'];
		setcookie("id", $_COOKIE['id'],time()+30*24*60*60);
		return true;
	}
}
else {
	return false;
}
	}

?>
