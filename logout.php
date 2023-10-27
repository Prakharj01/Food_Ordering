<?php
$conn = mysqli_connect("localhost","root","");
$cookie_username = $_COOKIE['username'];
$cookie_token = $_COOKIE['token'];
$query = "DELETE FROM organicfarming.cookietable WHERE username='$cookie_username';";
$result = mysqli_query($conn, $query);
if($result)
{
	setcookie('username',$username,-3600,'/');
	setcookie('token',$token,-3600,'/');
	header("Location:index.php");
}
?>