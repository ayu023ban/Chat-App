<?php include('profileprocess.php') ?>

<html>
<head>
<title>profile</title>
</head>
<body>

<div class= "wrapper">
<div class= "profileform">
<form method = "post" action = " <?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> " enctype = "multipart/form-data" >
<label for = "username"> Username </label>
		<input type = "text" name= "username" value = "<?php echo $username ?>" readonly><br>
<label for= "image">Select profile picture to upload: </label>
<input type = "file" name = "image" id = "image" required ><?php if ($error_image !== "") {
                                                                                        echo $error_image;
                                                                                    } ?> </span><br>

<label for ="name"> Name: </label>
<input type = "text" name = "name" id = "name" required><?php if ($error_name !== "") {
                                                                                        echo $error_name;
                                                                                    } ?> </span><br>

<label for="city">City:</label>
<input type = "text" id = "city" name = "city" required><?php if ($error_city !== "") {
                                                                                        echo $error_city;
                                                                                    } ?> </span><br>

<label for = "qualification">Qualification:</label><?php if ($error_qualification !== "") {
                                                                                        echo $_error_qualification;
                                                                                    } ?> </span><br>

<input type = "radio" name= "qualificartion" value = "master"> Masters <br>
<input type ="radio" name = "qualification" value = "bachelor"> Bachelors <br>
<input type ="radio" name = "qualification" value = "seniosec"> Senior Secondary <br>
<input type ="radio" name = "qualification" value = "sec" checked > Secondary <br>
<input type = "submit" name = "profile_submit"  value = "submit" >
</form>
</div>
</div>

</body>
</html>
