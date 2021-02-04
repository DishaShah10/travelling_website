<?php

	$Email = $_POST['email'];
	$Password = $_POST['password'];
	
	$host = "localhost";
	$user = "root";
	$pass = "";
	$dB = "signup";

	$conn = new mysqli($host,$user,$pass,$dB);
	if($conn->connect_error)
	{
		die("Connection Failed ".$conn->connect_error);
	}
	else
	{
		$select = "select Email from reg where email='$Email' AND
		 password='$Password' Limit 1";

		$stmt = $conn->prepare($select);
		$stmt->bind_param('ss',$Email,$Password);
		$stmt->execute();
		$stmt->bind_result($Email,$Password);
		$stmt->store_result();
		$rnum = $stmt->num_rows;

		if($rnum == 1)
		{
			header("location:home.html");
		}
		else
		{
			echo "Enter Correct Details...";
			header("location:login.html"); 
		}

		$stmt -> close();
		$conn -> close();	
	}
?>