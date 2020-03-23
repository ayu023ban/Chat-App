<?php include('signupprocess.php');
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Signup</title>
</head>

<body>
    <div class="wrapper">
        <div class="signupform">
            <h1>Sign-up form </h1>
            <form action="" method="post">

                <label for="email"><b>User name</b></label>
                <input id="username" type="text" name="username" required><span><?php if ($error_username != "") {
                                                                                    echo $error_username;
                                                                                } ?></span><br>

                <label for="email"><b>Email Address</b></label>
                <input id="email" type="email" name="email" required><span><?php if ($error_email != "") {
                                                                                echo $error_email;
                                                                            } ?></span><br>

                <label for="password"><b>Password</b></label>
                <input id="password" type="password" name="password" required><span><?php if ($error_password != "") {
                                                                                        echo $error_password;
                                                                                    } ?></span><br>

                <label for="phone"><b>phone number</b></label>
                <input id="phone" type="number" name="phone" required><span><?php if ($error_phone != "") {
                                                                                            echo $error_phone;
                                                                                        } ?></span><br>

                <label for="gender"><b> gender </b></label>
                <input type="radio" name="gender" id="male" value="male">
                <label for="male">Male</label><br>
                <input type="radio" name="gender" id="female" value="female">
                <label for="female">Female</label><br>
                <input type="radio" name="gender" id="other" value="other">
		<label for="other">other</label><br>
		<input class="table-button" id="register signup" type="submit" name="create" value="Sign Up">
                <a href="login.php" id="login"  class="table-button">Already registered? Login</a>
            </form>
        </div>
    </div>
</body>

</html>
