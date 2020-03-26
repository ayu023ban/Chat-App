<?php include('signupprocess.php');
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Signup</title>
</head>

<body>
    <div class="wrapper">
        <div class="container" style="max-width:600px; margin-top:150px">
            <h1>Sign-up form </h1>
            <form action="" method="post">

                <div class="form-group">
                    <input class="form-control" placeholder="Username" id="username" type="text" name="username" required><?php if ($error_username != "") {
                                                                                                                                    echo "<div class = 'alert alert-danger'>" . $error_username."</div>";
                                                                                                                                } ?>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Email" id="email" type="email" name="email" required><?php if ($error_email != "") {
                                                                                                                            echo "<div class='alert alert-danger'> ". $error_email . "</div>" ;
                                                                                                                        } ?>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Password" id="password" type="password" name="password" required><?php if ($error_password != "") {
                                                                                                                            echo "<div class='alert alert-danger'> ". $error_password . "</div>" ;
                                                                                                                        } ?>
                </div>
                <div class="form-group">
                    <input placeholder="Phonenumber" class="form-control" id="phone" type="number" name="phone" required><?php if ($error_phone != "") {
                                                                                                                            echo "<div class='alert alert-danger'> ". $error_phone . "</div>" ;
                                                                                                                        } ?>
                </div>
                <div class="form-group">
                    <!-- <div class="custom-control custom-radio"> -->
                    <input class="custom-control-unit" type="radio" checked name="gender" id="customRadio1" value="male">
                    <label for="customRadio1">Male</label>
                    <!-- </div> -->
                    <!-- <div class="custom-control custom-radio"> -->
                    <input class="custom-control-unit" type="radio" name="gender" id="female" value="female">
                    <label for="female">Female</label>
                    <!-- </div>-->
                    <!-- <div class="custom-control custom-radio">  -->
                    <input class="custom-control-unit" type="radio" name="gender" id="other" value="other">
                    <label for="other">other</label>
                    <!-- </div> -->
                </div>
                <input class="btn btn-outline-primary" type="submit" name="create" value="Sign Up">
                <a href="login.php" id="login" class="btn float-right btn-outline-success"> Login</a>
                <span class="float-right pt-2">Already registered?</span>
            </form>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="./js/signup.js"></script>                                                                                                                        
</body>

</html>