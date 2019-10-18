<?php	
	//Criar a conexão
	include_once ("crypt.php");
	$con = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($con,'chatbox');
	$salt = msgc('jh0n4t4c3s4r', 'e');
	if(!$con){
		die("Falha na conexao: " . mysqli_connect_error());
	}//else{
		//echo "Conexao realizada com sucesso";
	//}
?>

