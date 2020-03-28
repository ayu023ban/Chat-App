<?php
include('connect.php');
include('helperfunction.php');
session_start();
if(isset($_SESSION['msg']))echo $_SESSION['msg'];
unset($_SESSION['msg']);
if (isloggedin($conn)) {
	$_SESSION['msg'] = "you already have logged_in";
    header('location: profile.php');
}
$username = $email = $phone = $gender = $password =  "";

if(isset($_POST['username']))$username = test_input($_POST['username']);
if(isset($_POST['email']))$email = test_input($_POST['email']);
if(isset($_POST['phone']))$phone = test_input($_POST['phone']);
if(isset($_POST['password']))$password = test_input($_POST['password']) ;
if(isset($_POST['gender']))$gender = test_input($_POST['gender']);
$error_username = "";
$error_email = "";
$error_phone = "";
$error_password = "";
$is_correct_values = true;
if (isset($_POST['create'])) {


    if ($email!="") {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $result = $conn->query("SELECT email from ayush_user where email='$email'");
            $rows = $result->num_rows;
            if ($rows > 0) {
                $error_email = "email already taken ";
                $is_correct_values = false;
            } else {
                $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
            }
        } else {
            $error_email = "incorrect email type";
            $is_correct_values = false;
        }
    } else {
        $error_email = "email field cannot be empty";
        $is_correct_values = false;
    }


    if($username!=""){
        echo $username."mango";
	    $result = $conn->query("select username from ayush_user where username = '$username'");
	    $rows = $result->num_rows;
	    if($rows>0){
		    $error_username="username already taken";
		    $is_correct_values = false;
	    }
	    }
    else{
	    $error_username = "username cannot be empty";
	    $is_correct_values = false;
    }





    if ($password!="") {
        $password = password_hash(trim($_POST['password']),PASSWORD_DEFAULT);
    } else {
        $error_password = "password field cannot be empty";
        $is_correct_values = false;
    }

	if($is_correct_values){
		$sql = "insert into ayush_user (email ,password,username,phonenumber,gender) values('{$email}', '{$password}', '{$username}', '{$phone}','{$gender}');";

		if($conn->query($sql) ===TRUE){
			header('location: login.php');
			echo "New record created successfully";
		}
		else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
}
}
?>