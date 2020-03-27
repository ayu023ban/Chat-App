<?php function test_input($test_data)
{
        $test_data = trim($test_data);
        $test_data = stripslashes($test_data);
        $test_data = htmlspecialchars($test_data);
        return $test_data;
}

function isloggedin($conn)
{
        if (isset($_SESSION['id'])) {
                $sql = "select * from ayush_user where id = '{$_SESSION['id']}' limit 1 ";
                $result_query = $conn->query($sql);
                if ($result_query->num_rows > 0) {
                        return true;
                } else {
                        return false;
                }
        } else if (isset($_COOKIE['id'])) {
                $cookie_id_hash = password_hash($_COOKIE['id'], PASSWORD_DEFAULT);
                $sql = "select * from ayush_session";
                $result_query = $conn->query($sql);
                if ($result_query->num_rows > 0) {
                        while ($row = $result_query->fetch_assoc()) {
                                if (password_verify($_COOKIE['id'], $row['cookie_id'])) {
                                        $_SESSION['id'] = $row['session_id'];
                                        setcookie("id", $_COOKIE['id'], time() + 30 * 24 * 60 * 60);
                                        return true;
                                }
                        }
                }
        } else {
                return false;
        }
}



function logout(){
	if(isset($_COOKIE['id'])){
		setcookie("id","",time()-600);
	}
	unset($_SESSION['id']);
	session_destroy();
	header("location: login.php");
}


?>
