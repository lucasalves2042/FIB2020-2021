<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Controle de Produtos</title>
		<meta charset="utf-8">

		<script src="https://kit.fontawesome.com/5bffdd131e.js" crossorigin="anonymous"></script>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="inicio">
			<center>
				<a href="?pagina=AdicionarProduto">
					<button style="margin-right: 10px; margin-bottom: 15px;" type="button" class="btn btn-outline-warning">Cadastrar</button>
				</a>
				<a href="?pagina=PesquisarProduto">
  					<input type="submit" value="Pesquisar" style="margin-left: 10px; margin-bottom: 15px;"type="button" class="btn btn-outline-warning"></input>
  				</a>
			</center>
		</div>	
		<table class="table table">
			<thead>
			    <tr>
			    	<th scope="col">ID</th>
			      	<th scope="col">Produto</th>
			      	<th scope="col">Preço</th>
			      	<th scope="col">Quantidade</th>
			      	<th scope="col">Data Compra (mês)</th>
			      	<th scope="col"></th>
			      	<th scope="col"></th>
			    </tr>
			</thead>
			
			<?php 
			//Conexão com o Banco de Dados
			require("banco/conectaBanco.php");
			
			// executar comandos sql
			// consulta registros da tabela
			$query = $mysqli->query("select * from tbl_produtos");
			echo $mysqli->error;

			// carrega consulta de registros
			while ($tabela = $query->fetch_assoc()){
				echo "
				<tr>
					<td>$tabela[produtoID]</td>
					<td>$tabela[produtoNome]</td>
					<td>$tabela[produtoPreco]</td>
					<td>$tabela[produtoQuantidade]</td>
					<td>$tabela[produtoData]</td>

					<td width='120'>
						<a href='?pagina=AlterarProduto&AlterarProduto=$tabela[produtoID]'>
							<button type='button' class='btn btn-outline-primary'>Editar</button>
						</a>
					</td>
				
					<td width='120'>
						<a href='?pagina=ExcluirProduto&ExcluirProduto=$tabela[produtoID]'>
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