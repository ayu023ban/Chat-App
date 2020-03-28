<?php include('connect.php');
include('helperfunction.php');
session_start();
if(isloggedin($conn)){
	$_SESSION['msg']="you have already logged in";
	header("location: profile.php");
}
if(isset($_SESSION['msg']))echo $_SESSION['msg'];
unset($_SESSION['msg']);
$username = $password = "";
if(isset($_POST['username']))$username = test_input($_POST['username']);
if(isset($_POST['username']))$password = test_input($_POST['password']);
$remember_me = isset($_POST['remember_me']);
$error_username_login = "";
$error_password_login = "";
$error_button = "";
$is_correct_values = true;


	if(isset($_POST['login'])){
		if($username===""){
			$error_username_login = "username cannot be empty";
			$is_correct_values = false;
		}
		else if($password===""){
	
			$error_password_login = "password cannot be empty";
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
					echo "you have successfully logged in";
					if($remember_me){
						$cookie_id = rand();
						$cookie_id_hash = password_hash($cookie_id , PASSWORD_DEFAULT);
						setcookie("id",$cookie_id,time()+30*24*60*60);
						$sql = "insert into ayush_session (session_id , cookie_id) values ( {$row['id']} , '$cookie_id_hash' )";
						
						if($conn->query($sql)===true){
							echo "<div class='alert alert-success'>remembered successfully</div>";
						}
						else {
							echo "<div class='alert alert-danger>Error: " . $sql . "<br>" . $conn->error."</div>";
							die();
						}
					}
					header("location: profile.php");
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




?>
