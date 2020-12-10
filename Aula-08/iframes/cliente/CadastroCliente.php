<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Controle de Clientes</title>
		<meta charset="utf-8">

		<script src="https://kit.fontawesome.com/5bffdd131e.js" crossorigin="anonymous"></script>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="inicio">
			<center>
				<a href="?pagina=AdicionarCliente">
					<button style="margin-right: 10px; margin-bottom: 15px;" type="button" class="btn btn-outline-warning">Cadastrar</button>
				</a>
 				<a href="?pagina=PesquisarCliente">
  					<input type="submit" value="Pesquisar" style="margin-left: 10px; margin-bottom: 15px;"type="button" class="btn btn-outline-warning"></input>
  				</a>
			</center>
		</div>	
		<table class="table table">
			<thead>
			    <tr>
			    	<th scope="col">ID</th>
			      	<th scope="col">Nome</th>
			      	<th scope="col">CPF</th>
			      	<th scope="col">CEP</th>
			      	<th scope="col">Telefone</th>
			      	<th scope="col"></th>
			      	<th scope="col"></th>
			    </tr>
			</thead>
			
			<?php 
			//Conexão com o Banco de Dados
			require("banco/conectaBanco.php");
			
			// executar comandos sql
			// consulta registros da tabela
			$query = $mysqli->query("select * from tbl_clientes");
			echo $mysqli->error;

			// carrega consulta de registros
			while ($tabela = $query->fetch_assoc()){
				echo "
				<tr>
					<td>$tabela[clienteID]</td>
					<td>$tabela[clienteNome]</td>
					<td>$tabela[clienteCPF]</td>
					<td>$tabela[clienteCEP]</td>
					<td>$tabela[clienteFone]</td>

					<td width='120'>
						<a href='?pagina=AlterarCliente&AlterarCliente=$tabela[clienteID]'>
							<button type='button' class='btn btn-outline-primary'>Editar</button>
						</a>
					</td>
				
					<td width='120'>
						<a href='?pagina=ExcluirCliente&ExcluirCliente=$tabela[clienteID]'>
							<button type='button' class='btn btn-outline-danger'>Excluir</button>
						</a>
					</td>
				</tr>
				";
			}	
			?>
		</table>
	</body>
</html>