<?php include('connect.php');
include('helperfunction.php');
session_start();
if (!isloggedin($conn)) {
	$_SESSION['msg'] = "you are not logged in.";
	header("location: login.php");
}
echo $_SESSION['msg'];
unset($_SESSION['msg']);
date_default_timezone_set("Asia/Calcutta");

$sql = "select * from ayush_user where id = {$_SESSION['id']}";
$result_query = $conn->query($sql);
$userinfom = $result_query->fetch_assoc();
?>
<html>

<head>
	<title>home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="./css/indexstyle.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
	<h1 class="text-center"> Chat-Box</h1>
	<h3 class="text-center"><?php echo "Welcome ".$userinfom['username'] ?></h3>
	<div id="wrapper" class="container-fluid">
		<div class="row">
			<div id="users" class="col-md-6">
				<?php
				$sql = 'select * from ayush_user';
				$result_query = $conn->query($sql);
				if ($result_query->num_rows > 0) {
					while ($row = $result_query->fetch_assoc()) {
						echo "<div id = '" . $row['id'] . "' class = 'user container'  >";
						echo "<span class='primary'>" . $row['username'] . "</span>";
				?>
						<form class="float-right m-0 p-0" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
							<input name="secondperson" type="hidden" value="<?php echo $row['id'] ?>">
							<input name= "secondpersonusername" type = "hidden" value= "<?php echo $row['username']?>">
							<button class="btn btn-outline-secondary float-right" name="messageopen" type="submit">message</button>
						</form>
				<?php
						echo "</div><br>";
					}
				}
				?>
			</div>
			<?php
			if (isset($_POST['messageopen'])) {
				$_SESSION['secondperson'] = $_POST['secondperson'];
				$_SESSION['secondpersonusername']=$_POST['secondpersonusername'];
			}
			if (isset($_SESSION['secondperson'])) {
				echo "<div id='chat-box' class='col-md-6'>";
				?>
				<h2 class="text-center "><?php echo $_SESSION['secondpersonusername']?></h2>
				<?php
				$sql = "select * from ayush_chat where (sender_id = {$_SESSION['id']} && receiver_id = {$_SESSION['secondperson']} ) || ( receiver_id = {$_SESSION['id']} && sender_id = {$_SESSION['secondperson']} ) order by sent_at  ";

				$result_query = $conn->query($sql);
				if ($result_query->num_rows > 0) {
					while ($row = $result_query->fetch_assoc()) {
						echo " <div class = 'message mb-3 ";
						if ($row['sender_id'] === $_SESSION['secondperson']) {
							echo "secondperson ";
						} else {
							echo "firstperson text-right ";
						}
						echo "' >" . $row['message'] . "</div>";
					}
				} else {
					echo "no chat found<br>";
				}



				if (isset($_POST['messagesend'])) {
					$sql = "insert into ayush_chat (sender_id , receiver_id , message) values ( {$_SESSION['id']} , {$_SESSION['secondperson']} , '{$_POST['message']}'  )";
					if ($conn->query($sql) === true) {
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}



			?>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
					<div class="input-group mb-3">
						<input class="form-control" name="message" type="text" placeholder="message" aria-describedby="button-addon2">
						<div class="input-group-append">
							<input type="submit" class="btn btn-primary" name="messagesend" id="button-addon2" value="Send">
						</div>
					</div>

				</form>

			<?php
				echo "</div>";
			}

			?>


		</div>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<button class="btn btn-lg btn-outline-danger" type="submit" name="logout" id="logout">log out </button>
		</form>
		<?php
		if (isset($_POST['logout'])) {
			logout();
		}
		?>
	</div>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>