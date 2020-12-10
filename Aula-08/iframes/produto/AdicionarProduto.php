<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cadastrar Produto</title>

		<script src="https://kit.fontawesome.com/5bffdd131e.js" crossorigin="anonymous"></script>

			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

			<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<form method="POST" action="?pagina=AdicionarProduto">
 			<div>
 				<center>
 					<h2>Cadastrar Produto</h2>
    				<div class="form-group col-md-6">
     					<label>Nome do Produto:</label>
     					<input type="text" class="form-control" name="produtoNome" placeholder="Digite o Nome do Produto" maxlength="50">
	   				</div>
	   				<div class="form-group col-md-6">
	      				<label>Preço:</label>
	      				<input type="text" class="form-control" name="produtoPreco" placeholder="Digite o Preço" maxlength="10">
   					</div>
    				<div class="form-group col-md-6">
      					<label>Quantidade:</label>
      					<input type="text" class="form-control"name="produtoQuantidade" placeholder="Digite a Quantidade" maxlength="3">
    				</div>
    				<div class="form-group col-md-6">
      					<label>Data Compra (mês):</label>
      					<input type="text" class="form-control"name="produtoData" placeholder="Digite o Mês" maxlength="2">
    				</div>
    				<button type="submit" class=" btn btn-outline-warning btn-outline-warning2" name="botao">Cadastrar</button>
    				<a href='?pagina=CadastroProduto'>
						<button type='button' class='btn btn-outline-warning'>Voltar</button>
					</a>
    			</center>
    		</div>
  		</form>
	</body>
</html>

<?php 
if(isset($_POST["botao"])){

	require("banco/conectaBanco.php");

	//$nome=$_POST["nome"];
	$produtoNome=htmlentities($_POST["produtoNome"]);	
	$produtoPreco=htmlentities($_POST["produtoPreco"]);
	$produtoQuantidade=htmlentities($_POST["produtoQuantidade"]);
	$produtoData=htmlentities($_POST["produtoData"]);

	// gravando dados
	$mysqli->query("insert into tbl_produtos values('', '$produtoNome', '$produtoPreco', 
		'$produtoQuantidade', '$produtoData')");
	echo $mysqli->error;

	if($mysqli->error == ""){

		echo "
		<br/>
		<center>
			<div class='alert alert-warning' role='alert'>
  				Produto cadastrado com sucesso!
			</div>
		</center>";
	}

}
?>