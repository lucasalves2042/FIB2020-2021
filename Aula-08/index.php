<!DOCTYPE html>
<html>
	<head>
		<title>Controle da Loja</title>
		<meta charset="utf-8">

		<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="css/style.css">

	</head>
	<body>
		<div class="inicio">
			<center>
				<a href="index.php">
					<h1>Controle da Loja</h1>
				</a>
				<hr>
				<a href="?pagina=CadastroCliente">
					<button style="margin-right: 10px;" type="button" class="btn btn-outline-warning">Clientes</button>
				</a>
				<a href="?pagina=CadastroProduto">
					<button style="margin-left: 10px;"type="button" class="btn btn-outline-warning">Produtos</button>
				</a>
 				<a href="?pagina=CadastroFornecedor">
					<button style="margin-left: 18px;"type="button" class="btn btn-outline-warning">Fornecedores</button>
				</a>
				<hr>
			</center>
		</div>
		<div class="iframes">
		<?php
		if (isset($_GET["pagina"])) {
			$pagina = $_GET["pagina"];

			if ($pagina == 1) {
				require ("iframes/menu.php");
			}

			//Páginas Cliente
			if ($pagina == "CadastroCliente") {
				require ("iframes/cliente/CadastroCliente.php");
			}
			if ($pagina == "AdicionarCliente") {
				require("iframes/cliente/AdicionarCliente.php");
			}
			if ($pagina == "PesquisarCliente") {
				require("iframes/cliente/PesquisarCliente.php");
			}
			if ($pagina == "ExcluirCliente") {
				require("iframes/cliente/ExcluirCliente.php");
			}
			if ($pagina == "AlterarCliente") {
				require("iframes/cliente/AlterarCliente.php");
			}

			//Páginas Produto
			if ($pagina == "CadastroProduto") {
				require("iframes/produto/CadastroProduto.php");
			}
			if ($pagina == "AdicionarProduto") {
				require("iframes/produto/AdicionarProduto.php");
			}
			if ($pagina == "PesquisarProduto") {
				require("iframes/produto/PesquisarProduto.php");
			}
			if ($pagina == "ExcluirProduto") {
				require("iframes/produto/ExcluirProduto.php");
			}
			if ($pagina == "AlterarProduto") {
				require("iframes/produto/AlterarProduto.php");
			}

			//Páginas Fornecedor
			if ($pagina == "CadastroFornecedor") {
				require("iframes/fornecedor/CadastroFornecedor.php");
			}
			if ($pagina == "AdicionarFornecedor") {
				require("iframes/fornecedor/AdicionarFornecedor.php");
			}
			if ($pagina == "PesquisarFornecedor") {
				require("iframes/fornecedor/PesquisarFornecedor.php");
			}
			if ($pagina == "ExcluirFornecedor") {
				require("iframes/fornecedor/ExcluirFornecedor.php");
			}
			if ($pagina == "AlterarFornecedor") {
				require("iframes/fornecedor/AlterarFornecedor.php");
			}
		} 
		else {
			require ("iframes/menu.php");
		}
		?>
		</div>	
	</body>
</html>