<?php 
require("banco/conectaBanco.php");

$fornecedorNome=""; 
$fornecedorCNPJ="";
$fornecedorCEP="";
$fornecedorFone="";
if(isset($_GET["AlterarFornecedor"])){

	$fornecedorID = htmlentities($_GET["AlterarFornecedor"]);
	$query=$mysqli->query("select * from tbl_fornecedores where fornecedorID = '$fornecedorID'");
	$tabela=$query->fetch_assoc();
	$fornecedorNome=$tabela["fornecedorNome"];
	$fornecedorCNPJ=$tabela["fornecedorCNPJ"];
	$fornecedorCEP=$tabela["fornecedorCEP"];
	$fornecedorFone=$tabela["fornecedorFone"];
}

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Editar Fornecedor</title>
		<meta charset="utf-8">
		
		<script src="https://kit.fontawesome.com/5bffdd131e.js" crossorigin="anonymous"></script>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<form method="POST" action="?pagina=AlterarFornecedor">
			<center>
				<input type="hidden" name="fornecedorID" value="<?php echo $fornecedorID ?>">

				<div class="form-group col-md-6">
      				<label>Nome:</label>
      				<input type="text" class="form-control" name="fornecedorNome" placeholder="Digite o Nome" maxlength="50" value="<?php echo $fornecedorNome ?>">
    			</div>
    			<div class="form-group col-md-6">
    	  			<label>CNPJ:</label>
    	  			<input type="text" class="form-control" name="fornecedorCNPJ" placeholder="Digite o CNPJ" maxlength="14" value="<?php echo $fornecedorCNPJ ?>">
    			</div>
				<div class="form-group col-md-6">
    	  			<label>CEP:</label>
    	  			<input type="text" class="form-control" name="fornecedorCEP" placeholder="Digite o CEP" maxlength="8" value="<?php echo $fornecedorCEP ?>">
    			</div>
    			<div class="form-group col-md-6">
    	  			<label>Telefone:</label>
    	  			<input type="text" class="form-control" name="fornecedorFone" placeholder="Digite o Telefone" maxlength="9" value="<?php echo $fornecedorFone ?>">
    			</div>
				<button type='buton' class='btn btn-outline-warning' name="botaoFornecedor">Salvar</button>
				<a href='?pagina=CadastroFornecedor'>
					<button type='button' class='btn btn-outline-warning'>Voltar</button>
				</a>
			</center>
		</form>
	</body>
</html>


<?php 
if(isset($_POST["botaoFornecedor"])){

	$fornecedorID   = htmlentities($_POST["fornecedorID"]);
	$fornecedorNome = htmlentities($_POST["fornecedorNome"]);
	$fornecedorCNPJ  = htmlentities($_POST["fornecedorCNPJ"]);
	$fornecedorCEP = htmlentities($_POST["fornecedorCEP"]);
	$fornecedorFone = htmlentities($_POST["fornecedorFone"]);

	$mysqli->query(
		"update tbl_fornecedores 
		set fornecedorNome = '$fornecedorNome', fornecedorCNPJ='$fornecedorCNPJ', 
		fornecedorCEP='$fornecedorCEP', fornecedorFone='$fornecedorFone'
		where fornecedorID = '$fornecedorID'");

	echo $mysqli->error;
	if ($mysqli->error == "") {
		echo "
		<br/>
		<center>
			<div class='alert alert-warning' role='alert'>
  				Fornecedor editado com sucesso!
			</div>
		</center>";
	}
}

?>