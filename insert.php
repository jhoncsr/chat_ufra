<?php
session_start();
include_once ("conexao.php");
include_once ("crypt.php");
$uname = $_SESSION['username'];
$msg = msgc($_REQUEST['msg'],'e');


mysqli_query($con, "INSERT INTO logs (`username`, `msg`) VALUES ('$uname', '$msg')");

$result1 = mysqli_query($con, "SELECT * FROM logs ORDER BY id DESC");

while($extract = mysqli_fetch_array($result1)) {
	echo "<span>" . base64_decode($extract['username']) . "</span>: <span>" . msgc($extract['msg'], 'd' ) . "</span><br />";
}