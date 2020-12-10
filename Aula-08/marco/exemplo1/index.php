<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<script type="text/javascript">
		function confirma_exclusao(codigo) {
			if (window.confirm("Confirma exclusão")) { 
				window.open("excluir.php?codigo="+codigo, "Obrigado pela visita!");
			}
		}
	</script>	
<!-- 
	<script type="text/javascript">
		function confirma_exclusao(codigo) {
			if (window.confirm("Confirma exclusão")) { 
				location = "excluir.php?codigo="+codigo;
			}
		}
	</script>
-->
</head>
<body>
	<h2>Cadastro de Clientes</h2>
	<a href="adicionar.php"><button>Adicionar</button></a>
	<a href="pesquisar.php"><button>Pesquisar</button></a>
	<br />
	<table border="1" width="400">
		<tr>
			<th>Id</th>
			<th>CPF</th>
			<th>Nome do Cliente</th>
			<th>Ação</th>
		</tr>
		
		<?php 
		// conexao com o banco de dados
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
			<td width='120'><a href='javascript:confirma_exclusao($tabela[idcli])'>[excluir]</a>
			<a href='alterar.php?alterar=$tabela[idcli]'>[alterar]</a></td>
			</tr>
			";
		}
		?>
	</table>
	<script type="text/javascript">
		function confirma_exclusao(codigo) {
			if (window.confirm("Confirma exclusão")) { 
				location = "excluir.php?excluir="+codigo;
			}
		}
	</script>
</body>
</html>