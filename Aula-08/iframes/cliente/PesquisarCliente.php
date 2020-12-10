<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Pesquisar Cliente</title>
		<meta charset="utf-8">

		<script src="https://kit.fontawesome.com/5bffdd131e.js" crossorigin="anonymous"></script>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<form class="form-inline">
			<center>
				<h2>Pesquisa de Clientes</h2>
				<div class="form-group mx-sm-3 mb-2">
    				<input type="text" class="form-control" name="clienteNome" maxlength="50" placeholder="Digite o Nome">
	  				<input type="submit" class="btn btn-outline-warning btn-outline-warning4" value="Pesquisar" name="botaoPesquisar"></input>
	  			</div>
			</center>
		</form>
		<?php 
			if(isset($_POST["botaoPesquisar"])){

				require("banco/conectaBanco.php");
				$clienteNome=htmlentities($_POST["clienteNome"]);

				// gravando dados
				$query = $mysqli->query("select * from tbl_clientes where clienteNome like '%$clienteNome%'");
				echo $mysqli->error;

				echo "
				<table class='table table'>
				<thead>
			    		<tr>
			    			<th scope='col'>ID</th>
			      			<th scope='col'>Nome</th>
			      			<th scope='col'>CPF</th>
			      			<th scope='col'>CEP</th>
			      			<th scope='col'>Telefone</th>
			      			<th scope='col'></th>
			      			<th scope='col'></th>
			  	 		</tr>
					</thead>";
				while ($tabela=$query->fetch_assoc()) {
					echo "
					<tr>
					<td>$tabela[clienteID]</td>
					<td>$tabela[clienteNome]</td>
					<td>$tabela[clienteCPF]</td>
					<td>$tabela[clienteCEP]</td>
					<td>$tabela[clienteFone]</td>

					<td width='120'>
						<a href='AlterarCliente.php?AlterarCliente=$tabela[clienteID]'>
							<button type='button' class='btn btn-outline-primary'>Editar</button>
						</a>
					</td>
				
					<td width='120'>
						<a href='ExcluirCliente.php?ExcluirCliente=$tabela[clienteID]'>
							<button type='button' class='btn btn-outline-danger'>Excluir</button>
						</a>
					</td>
				</tr>";
				}
				echo "</table>";
			}	
		?>
		<center>
			<a href='?pagina=CadastroCliente'>
				<button type='button' class='btn btn-outline-warning'>Voltar</button>
			</a>
		</center>
	</body>
</html>