<?php
$to = $_POST['to'];
$from = $_POST['fromm'];
$departing = $_POST['departing'];
$returning = $_POST['returning'];
$adult = $_POST['adult'];
$children = $_POST['children'];


$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "book";

$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);

$select="SELECT to from b where to=?";
$insert="INSERT into b (to,fromm,departing,returning,adult,children)values(?,?,?,?,?,?)";

$stmt=$conn->prepare($select);
$stmt->bind_param("s",$to);
$stmt->execute();
$stmt->bind_result($to);
$stmt->store_result();
$rnum=$stmt->num_rows;

if($rnum==0){

	$stmt=$conn->prepare($insert);
	$stmt->bind_param("ssiiii",$to,$from,$departing,$returning,$adult,$children);
	$stmt->execute();
	echo"sdsaF";

}else{
	echo "plzz fill proper details";
}
$stmt->close();
$conn->close();
?>