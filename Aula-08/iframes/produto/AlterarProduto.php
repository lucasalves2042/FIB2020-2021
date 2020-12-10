<?php 
require("banco/conectaBanco.php");

$produtoNome=""; 
$produtoPreco="";
$produtoQuantidade="";
$produtoData="";
if(isset($_GET["AlterarProduto"])){

	$produtoID = htmlentities($_GET["AlterarProduto"]);
	$query=$mysqli->query("select * from tbl_produtos where produtoID = '$produtoID'");
	$tabela=$query->fetch_assoc();
	$produtoNome=$tabela["produtoNome"];
	$produtoPreco=$tabela["produtoPreco"];
	$produtoQuantidade=$tabela["produtoQuantidade"];
	$produtoData=$tabela["produtoData"];
}

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Editar Produto</title>
		<meta charset="utf-8">
		
		<script src="https://kit.fontawesome.com/5bffdd131e.js" crossorigin="anonymous"></script>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<form method="POST" action="?pagina=AlterarProduto">
			<center>
				<input type="hidden" name="produtoID" value="<?php echo $produtoID ?>">

				<div class="form-group col-md-6">
      				<label>Nome do Produto:</label>
      				<input type="text" class="form-control" name="produtoNome" placeholder="Digite o Nome" maxlength="50" value="<?php echo $produtoNome ?>">
    			</div>
    			<div class="form-group col-md-6">
    	  			<label>Preço:</label>
    	  			<input type="text" class="form-control" name="produtoPreco" placeholder="Digite o Preço" maxlength="10" value="<?php echo $produtoPreco ?>">
    			</div>
				<div class="form-group col-md-6">
    	  			<label>Quantidade:</label>
    	  			<input type="text" class="form-control" name="produtoQuantidade" placeholder="Digite a Quantidade" maxlength="3" value="<?php echo $produtoQuantidade ?>">
    			</div>
    			<div class="form-group col-md-6">
      				<label>Data Compra (mês):</label>
      				<input type="text" class="form-control"name="produtoData" placeholder="Digite o Mês" maxlength="2" value="<?php echo $produtoData ?>">
    				</div>
				<button type='buton' class='btn btn-outline-warning' name="botaoEditarProduto">Salvar</button>
				<a href='?pagina=CadastroProduto'>
					<button type='button' class='btn btn-outline-warning'>Voltar</button>
				</a>
			</center>
		</form>
	</body>
</html>


<?php 
if(isset($_POST["botaoEditarProduto"])){

	$produtoID   = htmlentities($_POST["produtoID"]);
	$produtoNome = htmlentities($_POST["produtoNome"]);
	$produtoPreco  = htmlentities($_POST["produtoPreco"]);
	$produtoQuantidade = htmlentities($_POST["produtoQuantidade"]);
	$produtoData = htmlentities($_POST["produtoData"]);

	$mysqli->query(
		"update tbl_produtos 
		set produtoNome = '$produtoNome', produtoPreco = '$produtoPreco', 
		produtoQuantidade = '$produtoQuantidade', produtoData = '$produtoData'
		where produtoID = '$produtoID'");

	echo $mysqli->error;
	if ($mysqli->error == "") {
		echo "
		<br/>
		<center>
			<div class='alert alert-warning' role='alert'>
  				Produto editado com sucesso!
			</div>
		</center>";
	}
}

?>