<?php include('profileeditprocess.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Profile Edit</title>
</head>
<body>
<nav class="navbar navbar-light bg-light mb-4">
		<a class="navbar-brand" href="index.php"><img width="40" height="40" src="./assets/images/logo.jpg" alt=""> Chat Box</a>
		<?php
		$sql = "select image from ayush_profile where user_id = {$_SESSION['id']}";
		$result_query = $conn->query($sql);
		$row = $result_query->fetch_assoc();
		?>
		<span>
			<span class=""><img src="<?php echo $row['image'] ?>" width="40" height="40" class="rounded-circle " alt="" srcset=""></span>
			<span class="navbar-text mr-4"><?php echo "Welcome " . $userinfom['username'] ?></span>
		</span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="profileedit.php">Profile Edit</a>
				</li>
				<li class="nav-item">
					<?php
					if (isset($_POST['logout'])) {
						logout();
					}
					?>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
						<button class="nav-link " type="submit" name="logout" id="logout" value="logout">log out </button>
					</form>
				</li>
			</ul>
		</div>
    </nav>
    




    <div class="wrapper">
        <div class="container" style="max-width:600px; margin-top:200px">
            <h1 class="text-center">Profile Edit</h1>
            <form method="post" action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> " enctype="multipart/form-data">




                <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="btn btn-outline-secondary">Username</span>
                    </div>
                    <input type="text" name="username" class="form-control" value="<?php echo $userinfom['username'] ?>" readonly><br>
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
                    echo"<div class-'alert alert-danger'>". $error_image."</div>";
                } ?> </span><br>


                <div class="form-group">
                    <input class="form-control" placeholder="Name" type="text" name="name" id="name" value="<?php echo $userprofileinform['name'] ?>" required>
                </div>

                <?php if ($error_name !== "") {
                    echo "<div class = 'alert alert-danger'>". $error_name. "</div";
                } ?>


                <div class="form-group">
                    <input class="form-control" placeholder="City" type="text" id="city" value="<?php echo $userprofileinform['city'] ?>" name="city" required>
                </div>
                <?php if ($error_city !== "") {
                    echo $error_city;
                } ?> </span><br>

              

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Qualification</label>
                    </div>
                    <select name="qualification" class="custom-select" id="inputGroupSelect01">
                        <option value="master" <?php if($userprofileinform['qualification']==="master") echo "selected"; ?> >Masters</option>
                        <option value="bachelor" <?php if($userprofileinform['qualification']==="bachelor") echo "selected"; ?> >Bachelors</option>
                        <option value="seniosec" <?php if($userprofileinform['qualification']==="seniosec") echo "selected"; ?> >Senior Secondary</option>
                        <option value="sec" <?php if($userprofileinform['qualification']==="sec") echo "selected"; ?> >Secondary</option>
                    </select>
                </div>
                <?php if ($error_qualification !== "") {
                    echo $_error_qualification;
                } ?>

                <input class="btn btn-lg btn-outline-success" type="submit" name="profile_submit" value="submit">
            </form>
        </div>
    </div>
</body>
</html>
