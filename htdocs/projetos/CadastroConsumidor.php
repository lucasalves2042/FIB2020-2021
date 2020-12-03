<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div>
			<center>
				<h2>Tabela de Consumidores</h2>
				<a href="PesquisaConsumidor.php">
					<button style="margin-right: 10px;" type="button" class="btn btn-outline-warning">Cadastrar</button>
				</a>
					<div class="form-group mx-sm-3 mb-2">
    					<input  placeholder="Pesquisar...">
  					</div>
			</center>
		</div>	
		<table class="table table">
			<thead>
			    <tr>
			    	<th scope="col">#</th>
			      	<th scope="col">Primeiro</th>
			      	<th scope="col">Último</th>
			      	<th scope="col">Nickname</th>
			    </tr>
			</thead>
			<tbody>
				<tr>
			    	<th scope="row">1</th>
			      		<td>Mark</td>
			      		<td>Otto</td>
			      		<td>@mdo</td>
			    </tr>
			    <tr>
			      	<th scope="row">2</th>
			      		<td>Jacob</td>
			      		<td>Thornton</td>
			      		<td>@fat</td>
			    </tr>
			    <tr>
			      	<th scope="row">3</th>
			      		<td>Larry</td>
			      		<td>the Bird</td>
			      		<td>@twitter</td>
			    </tr>
			</tbody>
		</table>
			
			<?php 
			//Conexão com o Banco de Dados
			require("conecta.php");
			
			// executar comandos sql
			// consulta registros da tabela
			$query = $mysqli->query("select * from tb_clientes");
			echo $mysqli->error;

			// carrega consulta de registros
			while ($tabela = $query->fetch_assoc()){
				echo "
				<tr><td align='center'>$tabela[idcli]</td>
				<td align='center'>$tabela[cpfcli]</td>
				<td align='center'>$tabela[nomecli]</td>

				<td width='120'><a href='excluir.php?excluir=$tabela[idcli]'>[excluir]</a>
				<a href='alterar.php?alterar=$tabela[idcli]'>[alterar]</a></td>
				</tr>
				";
			}	
			?>
		</table>
	</body>
</html>