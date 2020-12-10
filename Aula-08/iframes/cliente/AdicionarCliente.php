<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cadastrar Cliente</title>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<form method="POST" action="?pagina=AdicionarCliente">
 			<div>
 				<center>
 					<h2>Cadastrar Cliente</h2>
    				<div class="form-group col-md-6">
      					<label>Nome do Cliente:</label>
      					<input type="text" class="form-control" name="clienteNome" placeholder="Digite o Nome" maxlength="50">
    				</div>
    				<div class="form-group col-md-6">
      					<label>CPF</label>
      					<input type="text" class="form-control" name="clienteCPF" placeholder="Digite o CPF" maxlength="11">
    				</div>
    				<div class="form-group col-md-6">
      					<label>CEP</label>
      					<input type="text" class="form-control"name="clienteCEP" placeholder="Digite o CEP" maxlength="8">
    				</div>
    				<div class="form-group col-md-6">
      					<label>Telefone</label>
      					<input type="text" class="form-control"name="clienteFone" placeholder="Digite o Telefone" maxlength="9">
    				</div>
    				<input type="submit" value="Cadastrar" class=" btn btn-outline-warning btn-outline-warning2" name="botaoCliente"></input>
    				<a href="?pagina=CadastroCliente">
						<button type='button' class='btn btn-outline-warning'>Voltar</button>
					</a>
    			</center>
    		</div>
  		</form>
	</body>
</html>

<?php 
if(isset($_POST["botaoCliente"])){

	require("banco/conectaBanco.php");

	$clienteNome=htmlentities($_POST["clienteNome"]);
	$clienteCPF=htmlentities($_POST["clienteCPF"]);
	$clienteCEP=htmlentities($_POST["clienteCEP"]);
	$clienteFone=htmlentities($_POST["clienteFone"]);

	// gravando dados
	$mysqli->query("insert into tbl_clientes values('', '$clienteNome', '$clienteCPF', '$clienteCEP', 
		'$clienteFone')");
	echo $mysqli->error;

	if($mysqli->error == ""){

		echo "
		<br/>
		<center>
			<div class='alert alert-warning' role='alert'>
  				Cliente cadastrado com sucesso!
			</div>
		</center>";
	}

}
?>