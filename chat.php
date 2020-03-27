<?php include('connect.php');
include('helperfunction.php');
$userid = $_GET['userid'];
$secondid = $_GET['secondid'];
$sql = "select * from ayush_chat where (sender_id = {$userid} && receiver_id = {$secondid} ) || ( receiver_id = {$userid} && sender_id = {$secondid} ) order by sent_at  ";
$result_query =  $conn->query($sql);
$result_array = $result_query->fetch_all();
echo json_encode($result_array);