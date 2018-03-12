<?php

header("Content-Type:text/html;charset=utf-8");
$username =  $_POST["username"];
#echo "</br>";
$password = $_POST["password"];
echo $username;
echo $password;


#Connect to the mysql
$conn = mysqli_connect("localhost","root","root");
if (!$conn)
{
	die('Wrong Connection'.mysqli_error());
}
else
{
	echo "Right Connection";
}
mysqli_query($conn,"SET NAMES UTF8");

#Create the Database for the system, the name is Salary_management
$databaseName = "SALARY_MANAGEMENT";
$sql = 'CREATE DATABASE if not exists '. $databaseName .' Character Set UTF8';
$retval = mysqli_query($conn,$sql );
if(! $retval )
{
    die('创建数据库失败: ' . mysqli_error($conn));
}
echo "表格创建 DATABASE 创建成功\n";
echo '</br>';

#choose the database SALARY_MANAGEMENT
$conn->select_db($databaseName);

##Create the table used for login
$conn->query('Drop table login_management');
$sql = 'CREATE TABLE if not exists login_management
(id  varchar(15),
name varchar(15),
passWord varchar(15))';
if(!$result = $conn->query($sql))
{
	die('Create the login table fail' . mysqli_error($conn));
	exit;
}
echo "Create Table for login Right</br>";

$result = $conn->query('Drop Table salary');
##Create the table for Salary
$sql = 'CREATE Table if not exists salary
(序号                  tinyint,
姓名                   varchar(10),
工号                   varchar(10),
基本工资               Float,
职岗工资               Float,
校龄工资               Float,
优补                   Float,
教学工作量积分（分）   Float,
教学考核（分）         Float,
教科研考核（分）       Float,
德育考核（元）         Float,
教研组长（元）         Float,
职务工资（元）         Float,
接送车（元）           Float,
餐费补助（元）         Float,
临时代课（元）         Float,
其他                   Float,
养老金扣除             Float,
失业金扣除             Float,
住房扣除               Float,
扣税                   Float,
扣款                   Float,
Primary Key(工号)
)';
if(!$result = $conn->query($sql))
{
	die('Create the salary table fail' . mysqli_error($conn));
	exit;
}
echo "Create Table for Salary Right";



?>
