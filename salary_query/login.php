<?php

session_start();
$username = $_POST['name'];
$password = $_POST['pwd'];


$realPassword = "";
$loginStatus = "";
$conn = new mysqli("localhost","root","root","SALARY_MANAGEMENT");
#Check whether the connection is OK
if ($conn->connect_errno)
{
	die('Connect Error:' . $mysqli->connect_errno);
}
echo "test";
#Select the record from the table which the ID is the username
$sql = "select ID,PassWord from login_management where ID = '$username'";
if (!$result = $conn->query($sql))
{
	$loginStatus = "The Query is wrong";
}
echo "test1";
if (0 == $conn->affected_rows)
{
	$loginStatus = "The username doesn't exist!";
}
elseif (1 < $conn->affected_rows)
{
	$loginStatus = "The username ";
}
else
{
echo "test2";
	while($row = $result->fetch_assoc())
	{
		$realpassword = $row["PassWord"];
	}
}
echo "test4";

if ("111111" != $password)
{
	$loginStatus = $realpassword. "The Wrong Password" .($password != $realPassword);
}
else
{
	$loginStatus = "Permitted";
}
$array = array($username,$password,$loginStatus);
echo "test3";
echo json_encode($array);



$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
?>
