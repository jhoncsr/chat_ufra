<?php
session_start();
$uname = $_SESSION['username'];
$msg = base64_encode($_REQUEST['msg']);

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'chatbox');	

mysqli_query($con, "INSERT INTO logs (`username`, `msg`) VALUES ('$uname', '$msg')");

$result1 = mysqli_query($con, "SELECT * FROM logs ORDER BY id DESC");

while($extract = mysqli_fetch_array($result1)) {
	echo "<span>" . base64_decode($extract['username']) . "</span>: <span>" . base64_decode($extract['msg']) . "</span><br />";
}