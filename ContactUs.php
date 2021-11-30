<?php
	$user= $_POST['user'];
    $email= $_POST['email'];
	$message = $_POST['message'];
	$time_now=mktime(date('h')+4,date('i')+30,date('s'));
	$timestamp = date('d-m-Y H:i', $time_now);
	

	// Database connection
	$conn = new mysqli('localhost','root','','vkg');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into readersinfo(user, email, message, timestamp) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $user, $email, $message, $timestamp);
		$execval = $stmt->execute();
		echo $execval;
		echo "Message Sent successfully...";
	}
?>
