<?php  
	$domain="localhost";	// localização
	$user="root";			// usuário
	$password="";			// senha
	$database="bd_projeto";	// banco de dados	

	// instanciando a classe mysqli
	$mysqli = new mysqli($domain,$user,$password,$database);

	if($mysqli->connect_errno){

		echo "Não foi possível conectar com o Banco de Dados ";
		echo $mysqli->connect_error; // mostra causa do erro
	}
	?>