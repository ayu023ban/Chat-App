<?php include('loginprocess.php')
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="wrapper">
        <div class="container text-center" style="max-width: 600px">
            <h1 class="text-center">Login</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <input type="test" class="form-control" name="username" placeholder="Username" required id="username">
                </div>
                <?php if ($error_username_login !== "") {
                    echo "<div class='alert alert-danger'>" . $error_username_login . "</div>";
                } ?>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <?php if ($error_password_login != "") {
                    echo "<div class='alert alert-danger'>" . $error_password_login . "</div>";
                } ?>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="remember_me" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">remember me </label>
                </div>


                <div id="float-left">
                    <input id="login" class="btn btn-lg btn-outline-primary" type="submit" name="login" value="Log in">
                    <a href="signup.php" id="signup" class="btn btn-lg btn-outline-success">Want To Sign Up?</a>
                </div>
                <?php if ($error_button != "") {
                    echo "<div class='mt-3 alert alert-danger'>" . $error_button . "</div>";
                } ?>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>