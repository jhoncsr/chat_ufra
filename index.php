<?php

session_start();

if(!isset($_SESSION['username'])) {
?>
<form name="form2" action="login.php" method="post">
<table border="1" align="center">

<tr>
<td>Usuario: </td>
<td><input type="text" name="username"></td>
</tr>

<tr>
<td>Senha: </td>
<td><input type="password" name="password"></td>
</tr>

<tr>
<td colspan="2"><input type="submit" name="submit" value="Login"></td>
</tr>

<tr>
<td colspan="2"><a href="register.php">Registre-se aqui</a></td>
</tr>

</table>
</form>


<?php
exit;
}

?>

<html>
<head>
<title>Chat Box</title>

<script
  src="http://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

<script>

function submitChat() {
	if(form1.msg.value == '') {
		alert("Digite sua mensagem");
		return;
	}
	var msg = form1.msg.value;
	var xmlhttp = new XMLHttpRequest();
	
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
		}
	}
	
	xmlhttp.open('GET','insert.php?msg='+msg,true);
	xmlhttp.send();

}

$(document).ready(function(e){
	$.ajaxSetup({
		cache: false
	});
	setInterval( function(){ $('#chatlogs').load('logs.php'); }, 2000 );
});

</script>


</head>
<body>
<form name="form1">
Seu Nome: <b><?php echo base64_decode($_SESSION['username']); ?></b> <br />
Digite sua mensagem: <br />
<textarea name="msg"></textarea><br />
<a href="#" onclick="submitChat()">Enviar</a><br /><br />

<a href="logout.php">Sair</a><br /><br />

</form>
<div id="chatlogs">
CARREGANDO HISTORICO...
</div>

</body>