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
?>
<html>

<head>
	<title>home</title>
</head>

<body>
	<div id="wrapper">
		<div id=users>
			<?php
			$sql = 'select * from ayush_user';
			$result_query = $conn->query($sql);
			if ($result_query->num_rows > 0) {
				while ($row = $result_query->fetch_assoc()) {
					echo "<div id = '" . $row['id'] . "' class = 'user'  >";
					echo "<span>" . $row['username'] . "</span>";
			?>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
						<input name="secondperson" type="hidden" value="<?php echo $row['id'] ?>">
						<button name="messageopen" type="submit">message</button>
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
		}
		if (isset($_SESSION['secondperson'])) {
			echo "<div id='chat-box'>";
			$sql = "select * from ayush_chat where (sender_id = {$_SESSION['id']} && receiver_id = {$_SESSION['secondperson']} ) || ( receiver_id = {$_SESSION['id']} && sender_id = {$_SESSION['secondperson']} ) order by sent_at  ";
			
			$result_query = $conn->query($sql);
			if ($result_query->num_rows > 0) {
				while ($row = $result_query->fetch_assoc()) {
					echo " <div class = 'message ";
					if ($row['sender_id'] === $_SESSION['secondperson']) {
						echo "secondperson";
					} else {
						echo "firstperson";
					}
					echo "' >" . $row['message'] . "</div>";
				}
			} else {
				echo "no chat found<br>";
			}



			if (isset($_POST['messagesend'])) {
				$sql = "insert into ayush_chat (sender_id , receiver_id , message) values ( {$_SESSION['id']} , {$_SESSION['secondperson']} , '{$_POST['message']}'  )";
				if($conn->query($sql) === true){
					
				}
				else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
			


		?>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<input name="message" type="text" placeholder="message">
				<input type="submit" name="messagesend" value="Send">
			</form>

		<?php
			echo "</div>";
		}

		?>

		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<button type="submit" name="logout" id="logout">log out </button>
		</form>
		<?php
		if (isset($_POST['logout'])) {
			logout();
		}
		?>
	</div>

</body>

</html>
