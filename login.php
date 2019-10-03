<?php
session_start();
$salt = 'jh0n4t4c3s4r';
$username = base64_encode($_POST['username']);
$password = md5($_POST['password'].$salt);

$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con,'chatbox');

$result = mysqli_query($con, "SELECT * FROM users WHERE username='$username' AND password='$password'");

if(mysqli_num_rows($result)){
	$res = mysqli_fetch_array($result);
	
	$_SESSION['username'] = $res['username'];
	echo "Você está logado. Click <a href='index.php'>aqui</a> para acessar o chat.";
}

else{
	
	echo "Usuario não econtrado. Acesse <a href='index.php'>voltar</a> e coloque o login corretamente.<br>";
	echo "Você pode criar uma conta nova apenas clicando  <a href='register.php'>aqui</a>.";
	
}

?>