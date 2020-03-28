<?php include('profileprocess.php') ?>

<html>

<head>
    <title>profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <div class="wrapper">
        <div class="container" style="max-width:600px; margin-top:200px">
            <h1 class="text-center">Profile </h1>
            <form method="post" action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> " enctype="multipart/form-data">




                <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="btn btn-outline-secondary">Username</span>
                    </div>
                    <input type="text" name="username" class="form-control" value="<?php echo $username ?>" readonly><br>
                </div>




                <div class="input-group mb-3 mt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <label class="custom-file-label" for="image">Choose Image </label>
                        <input type="file" class="custom-file-input" name="image" id="image" required>
                    </div>
                </div>

                <?php if ($error_image !== "") {
                    echo "<div class='alert alert-danger'>" . $error_image . "</div>";
                } ?>


                <div class="form-group">
                    <input class="form-control" placeholder="Name" type="text" name="name" id="name" required>
                </div>

                <?php if ($error_name !== "") {
                    echo "<div class='alert alert-danger'>" . $error_name . "</div>";
                } ?>


                <div class="form-group">
                    <input class="form-control" placeholder="City" type="text" id="city" name="city" required>
                </div>
                <?php if ($error_city !== "") {
                    echo "<div class='alert alert-danger'>" . $error_city . "</div>";
                } ?> 
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Qualification</label>
                    </div>
                    <select name="qualification" class="custom-select" id="inputGroupSelect01">
                        <option value="master" selected>Masters</option>
                        <option value="bachelor">Bachelors</option>
                        <option value="seniosec">Senior Secondary</option>
                        <option value="sec">Secondary</option>
                    </select>
                </div>
                <?php if ($error_qualification !== "") {
                    echo "<div class='alert alert-danger'>" . $error_qualification . "</div>";
                } ?>

                <input type="submit" name="profile_submit" value="submit">
            </form>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>