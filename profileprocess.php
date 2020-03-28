<?php include('connect.php');
include('helperfunction.php');
session_start();
if (!isloggedin($conn)) {
        $_SESSION['msg'] = "you are not logged in.";
        header('location: login.php');
}
if (isset($_SESSION['msg'])) echo $_SESSION['msg'];
unset($_SESSION['msg']);



$error_image = "";
$error_name = "";
$error_city = "";
$error_qualification = "";
$image_name = $name = $city = $qualification = $image_tmp = "";
if (isset($_POST['name'])) {
        $name = test_input($_POST['name']);
}
if (isset($_POST['city'])) {
        $city = test_input($_POST['city']);
}
if (isset($_POST['qualification'])) {
        $qualification = test_input($_POST['qualification']);
}
$is_correct_values = true;

$sql = "select * from ayush_user where id = {$_SESSION['id']} limit 1";
$result_query = $conn->query($sql);
if ($result_query->num_rows > 0) {
        $row = $result_query->fetch_assoc();
        $username = $row['username'];
}
$sql = " select * from ayush_profile where user_id = {$_SESSION['id']} limit 1 ";
$result_query = $conn->query($sql);
if ($result_query->num_rows > 0) {
        $_SESSION['msg'] = "you have alreaded made your profile";
        header("location: index.php");
}



if (isset($_POST['profile_submit'])) {
        $qual_array = array("master", "bachelor", "seniosec", "sec");

        if ($name === "") {
                $error_name = "name field cannot be empty";
                $is_correct_values = false;
        } else if ($city === "") {
                $error_city = "city field cannot be empty";
                $is_correct_values = false;
        } else if ($qualification === "") {
                $error_qualification = "qualification field cannot be empty";
                $is_correct_values = false;
        } else if (in_array($qualification, $qual_array) === false) {
                $error_qualification = "qualification field doesnot match with provided values";
                $is_correct_values = false;
        }

        if (isset($_FILES['image'])) {
                $image_name = $_FILES['image']['name'];
                $image_size =$_FILES['image']['size'];
                $image_tmp = $_FILES['image']['tmp_name'];
                $image_type = $_FILES['image']['type'];
                $image_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
                $extensions = array("jpeg", "jpg", "png");
                if (in_array($image_ext, $extensions) === false) {
                        $error_image = "extension not allowed, please choose a JPEG or PNG file.";
                        $is_correct_values = false;
                }
                if ($image_size > 428304) {
                        $error_image = "File size must be lower than 4 MB";
                        $is_correct_values = false;
                }
        } else {
                $error_image = "File is not chosen";
                $is_correct_values = false;
        }
       

        if ($is_correct_values) {
                $image_new_name = "images/" . $_SESSION['id'] . "." . $image_ext;
                move_uploaded_file($image_tmp, $image_new_name);
                $sql = "insert into ayush_profile ( user_id, image , name,city,qualification) values ({$_SESSION['id']}, '{$image_new_name}' , '{$name}' , '{$city}' , '{$qualification}' ) ";
                if ($conn->query($sql) === TRUE) {

                        $_SESSION['msg'] = "New record created successfully";
                        header('location: index.php');
                } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                }
        }
}

?>