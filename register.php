<?php

if(isset($_POST['submit'])) {

    include_once ("conexao.php");
	$uname = base64_encode($_POST['username']);
	$pword = md5($_POST['password'].$salt);
	$pword2 = md5($_POST['password2'].$salt);
 

	if($pword != $pword2) {
		echo "Senhas não são a mesma. <br>";
	}
	else {
		$checkexist = mysqli_query($con, "SELECT username FROM users WHERE username = '$uname'");
		if(mysqli_num_rows($checkexist)){
			echo "Nome de usuario já existente, utilize outro.<br>";
		}
		else {
			mysqli_query($con, "INSERT INTO users (`username`,`password`) VALUES('$uname','$pword')" );
			
			echo "Você agora esta registrado. Click <a href='index.php'>aqui</a> para conversar";
		}
		
	}

}

?>

<html>

<head>

<title></title>

</head>

<body>
<form name="form1" action="register.php" method="post">
<table border="1" align="center">

<tr>
<td>Nome: </td>
<td><input type="text" name="username"></td>
</tr>

<tr>	
<td>Senha: </td>
<td><input type="password" name="password"></td>
</tr>

<tr>
<td>Repita a Senha: </td>
<td><input type="password" name="password2"></td>
</tr>

<tr>
<td colspan="2"><input type="submit" name="submit" value="Register"></td>
</tr>


</table>
</form>

<body>
</html>