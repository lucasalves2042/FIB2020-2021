<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Excluir Produto</title>
		<meta charset="utf-8">

		<script src="https://kit.fontawesome.com/5bffdd131e.js" crossorigin="anonymous"></script>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="css/style.css">

	</head>
	<body>
		<?php 
			if(isset($_GET["ExcluirProduto"])){

				$produtoID = htmlentities($_GET["ExcluirProduto"]);
				
				require("banco/conectaBanco.php");
				
				$mysqli->query("delete from tbl_produtos where produtoID = '$produtoID'");
			
				echo $mysqli->error;
				
				if ($mysqli->error==""){

					echo "
					<br/>
					<center>
						<div class='alert alert-warning' role='alert'>
  							Produto excluído com sucesso!
						</div>
					</center>";
					
					echo "
					<center>
						<a href='?pagina=CadastroProduto'>
							<button type='button' class='btn btn-outline-warning'>Voltar</button>
						</a>
					</center>";
				}
			}	
		?>
	</body>
</html>