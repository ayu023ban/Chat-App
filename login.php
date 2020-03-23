<?php include('loginprocess.php')
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <div class="wrapper">
        <div class="loginform">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <label for="username"><b>username</b></label>
                <input type="test" name="username" required  id="username"><span> <?php if ($error_username_login !== "") {
                                                                                        echo $error_username_login;
                                                                                    } ?> </span><br>

                <label for="password"><b>Password</b></label>
                <input class="form-control" type="password" name="password" required><?php if ($error_password_login != "") {
                                                                                            echo $error_password_login;
                                                                                        } ?><br>
		<input type= "checkbox" name = "remember_me" id = "remember_me"  >
		<label for="remember_me">remember me </label>
			


                <div id="floatleft">
                    <input id="login" class="table-button" type="submit" name="login" value="Log in"><?php if ($error_button != "") {
                                                                                                            echo $error_button;
                                                                                                        } ?>
                    <a href="signup.php" id="signup" class="table-button">Want To Sign Up?</a>
                </div>
        </div>
    </div>
</body>

</html>
