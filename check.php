<?php
include('connect.php');
if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $sql = "select * from ayush_user where username = '{$username}' limit 1 ";
    $result_query = $conn->query($sql);
    if ($result_query->num_rows > 0) {
        echo "username already exists";
    } else echo "";
}

if(isset($_GET['email'])){
    $email = $_GET['email'];
    $sql = "select * from ayush_user where email = '{$email}' limit 1 ";
    $result_query= $conn->query($sql);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo "email format not correct";
    }
    else if($result_query->num_rows>0 ){
        echo "email already exists";
    }
    else echo "";
}

