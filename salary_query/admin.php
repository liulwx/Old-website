<?php

session_start();
$username = $_POST['name'];
$password = $_POST['pwd'];
$md5pwd = md5($password); 

$realPassword = "";
$loginStatus = "";
$conn = new mysqli("localhost","root","root","SALARY_MANAGEMENT");
#Check whether the connection is OK
if ($conn->connect_errno)
{
	die('Connect Error:' . $mysqli->connect_errno);
}
#Select the record from the table which the ID is the username
$sql = "insert into login_management (id,name,password) values ('$username','','$md5pwd')";
if (!$result = $conn->query($sql))
{
	$loginStatus = "Insert user fail".$mysqli->connect_errno;
}
echo $result;
if (0 == $conn->affected_rows)
{
	$loginStatus = "Insert userfail";
}
else
{
	$loginStatus = "Permitted";
}
$array = array($username,$password,$loginStatus);
echo json_encode($array);



$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
?>
