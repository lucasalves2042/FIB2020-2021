<!DOCTYPE html>
<html>
<head>
	<title>Cacareco 2</title>
	<link rel="stylesheet" type="text/css" href="css/layout.css">
</head>
<body>		
	<div class="topo">
		<div class="left" id="abrir-mapa"></div>

		<div class="right">
			<div class="parte-1" id="abrir-facebook"></div>
			<div class="parte-2" id="chamar-whatsapp"></div>
			<div class="parte-3" id="abrir-site"></div>				
		</div>

		<div class="center"></div>
	</div>	
	<div class="linha1">
		<div class="menu">
			<a href="?pagina=1"><div class="botao">Home</div></a>
			<a href="?pagina=2"><div class="botao">Clientes</div></a>
			<a href="?pagina=3"><div class="botao">Parceiros</div></a>
			<a href="?pagina=4"><div class="botao">Figuras</div></a>			
		</div>
	</div>	
	<div class="linha2">
		<?php
		if (isset($_GET["pagina"])) {
			$pagina = $_GET["pagina"];
			if ($pagina == 1) {
				require ("php/home.php");
			}
			if ($pagina == 2) {
				require ("php/clientes.php");
			}
			if ($pagina == 3) {
				require ("php/parceiros.php");
			}
			if ($pagina == 4) {
				require ("php/galeria.php");
			}			
		} 
		else {
			require ("php/home.php");
		}
		?>
	</div>	
	<script type="text/javascript" src="js/eventos.js?<?php echo time() ?>"></script>	
</body>
</html>