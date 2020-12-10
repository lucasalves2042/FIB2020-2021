<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cadastrar Fornecedor</title>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<form method="POST" action="?pagina=AdicionarFornecedor">
 			<div>
 				<center>
 					<h2>Cadastrar Fornecedor</h2>
    				<div class="form-group col-md-6">
      					<label>Nome do Fornecedor:</label>
      					<input type="text" class="form-control" name="fornecedorNome" placeholder="Digite o Nome" maxlength="50">
    				</div>
    				<div class="form-group col-md-6">
      					<label>CNPJ</label>
      					<input type="text" class="form-control" name="fornecedorCNPJ" placeholder="Digite o CNPJ" maxlength="14">
    				</div>
    				<div class="form-group col-md-6">
      					<label>CEP</label>
      					<input type="text" class="form-control"name="fornecedorCEP" placeholder="Digite o CEP" maxlength="8">
    				</div>
    				<div class="form-group col-md-6">
      					<label>Telefone</label>
      					<input type="text" class="form-control"name="fornecedorFone" placeholder="Digite o Telefone" maxlength="9">
    				</div>
    				<input type="submit" value="Cadastrar" class=" btn btn-outline-warning btn-outline-warning2" name="botaoFornecedor"></input>
    				<a href='?pagina=CadastroFornecedor'>
						<button type='button' class='btn btn-outline-warning'>Voltar</button>
					</a>
    			</center>
    		</div>
  		</form>
	</body>
</html>

<?php 
if(isset($_POST["botaoFornecedor"])){

	require("banco/conectaBanco.php");

	$fornecedorNome=htmlentities($_POST["fornecedorNome"]);
	$fornecedorCNPJ=htmlentities($_POST["fornecedorCNPJ"]);
	$fornecedorCEP=htmlentities($_POST["fornecedorCEP"]);
	$fornecedorFone=htmlentities($_POST["fornecedorFone"]);

	// gravando dados
	$mysqli->query("insert into tbl_fornecedores values('', '$fornecedorNome', 
		'$fornecedorCNPJ', '$fornecedorCEP', '$fornecedorFone')");
	echo $mysqli->error;

	if($mysqli->error == ""){

		echo "
		<br/>
		<center>
			<div class='alert alert-warning' role='alert'>
  				Fornecedor cadastrado com sucesso!
			</div>
		</center>";
	}
}
?>