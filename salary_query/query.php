<?php
echo "pctteee";
session_start();
$username = $_SESSION['username'];
$conn = new mysqli("localhost","root","root","salary_management");
$printInfo = "";
if ($conn->errno)
{
	$printInfo = $conn->errno();
}

echo "test1";
$sheetname = "salary";
$sql = "select * from salary where 工号 = '$username'";
echo "test2";
if (!$result = $conn->query($sql))
{
	$printInfo = "查询条件设置错误";
}
#Judege whether legal
if (0 == $conn->affected_rows)
{
	$loginStatus = "The username doesn't exist!";
}
#Judge whether repeat result exist
elseif (1 < $conn->affected_rows)
{
	$loginStatus = "The username repeated";
}
else
{
	while($row = $result->fetch_assoc())
	{
		$printInfo = $row;
	}
}
echo json_encode($printInfo,JSON_UNESCAPED_UNICODE);
?>
