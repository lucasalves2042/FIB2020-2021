<?php 
require("banco/conectaBanco.php");

$clienteNome=""; 
$clienteCPF="";
$clienteCEP="";
$clienteFone="";
if(isset($_GET["AlterarCliente"])){

	$clienteID = htmlentities($_GET["AlterarCliente"]);
	$query=$mysqli->query("select * from tbl_clientes where clienteID = '$clienteID'");
	$tabela=$query->fetch_assoc();
	$clienteNome=$tabela["clienteNome"];
	$clienteCPF=$tabela["clienteCPF"];
	$clienteCEP=$tabela["clienteCEP"];
	$clienteFone=$tabela["clienteFone"];
}

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Editar Cliente</title>
		<meta charset="utf-8">
		
		<script src="https://kit.fontawesome.com/5bffdd131e.js" crossorigin="anonymous"></script>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<form method="POST" action="?pagina=AlterarCliente">
			<center>
				<input type="hidden" name="clienteID" value="<?php echo $clienteID ?>">

				<div class="form-group col-md-6">
      				<label>Nome:</label>
      				<input type="text" class="form-control" name="clienteNome" placeholder="Digite o Nome" maxlength="50" value="<?php echo $clienteNome ?>">
    			</div>
    			<div class="form-group col-md-6">
    	  			<label>CPF:</label>
    	  			<input type="text" class="form-control" name="clienteCPF" placeholder="Digite o CPF" maxlength="11" value="<?php echo $clienteCPF ?>">
    			</div>
				<div class="form-group col-md-6">
    	  			<label>CEP:</label>
    	  			<input type="text" class="form-control" name="clienteCEP" placeholder="Digite o CEP" maxlength="8" value="<?php echo $clienteCEP ?>">
    			</div>
    			<div class="form-group col-md-6">
    	  			<label>Telefone:</label>
    	  			<input type="text" class="form-control" name="clienteFone" placeholder="Digite o Telefone" maxlength="9" value="<?php echo $clienteFone ?>">
    			</div>
				<button type='buton' class='btn btn-outline-warning' name="botaoCliente">Editar</button>
				<a href='?pagina=CadastroCliente'>
					<button type='button' class='btn btn-outline-warning'>Voltar</button>
				</a>
			</center>
		</form>
	</body>
</html>

<?php 
if(isset($_POST["botaoCliente"])){

	$clienteID   = htmlentities($_POST["clienteID"]);
	$clienteNome = htmlentities($_POST["clienteNome"]);
	$clienteCPF  = htmlentities($_POST["clienteCPF"]);
	$clienteCEP = htmlentities($_POST["clienteCEP"]);
	$clienteFone = htmlentities($_POST["clienteFone"]);

	$mysqli->query(
		"update tbl_clientes 
		set clienteNome = '$clienteNome', clienteCPF='$clienteCPF', clienteCEP='$clienteCEP', 
		clienteFone='$clienteFone' 
		where clienteID = '$clienteID'");

	echo $mysqli->error;
	if ($mysqli->error == "") {
		echo "
		<br/>
		<center>
			<div class='alert alert-warning' role='alert'>
  				Cliente editado com sucesso!
			</div>
		</center>";
	}
}

?>