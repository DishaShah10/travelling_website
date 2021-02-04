<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$phone_no = $_POST['phone_no'];
$email = $_POST['email'];

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "signup";

$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);

$select="SELECT email from reg where email=?";
$insert="INSERT into reg (firstname,lastname,username,password,confirm_password,phone_no,email)values(?,?,?,?,?,?,?)";

$stmt=$conn->prepare($select);
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
$rnum=$stmt->num_rows;

if($rnum==0){

	$stmt=$conn->prepare($insert);
	$stmt->bind_param("sssssis",$firstname,$lastname,$username,$password,$confirm_password,$phone_no,$email );
	$stmt->execute();
	echo "new record inserted successfully";
}else{
	echo "someone already reg";
}
$stmt->close();
$conn->close();
?>