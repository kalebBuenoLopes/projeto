<!DOCTYPE html>
<html lang="pt-br">

<head>
	<!--Tags básicas do head-->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jogos</title>
	<!--Link dos nossos arquivos CSS e JS padrão-->
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script src="js/scripts.js"></script>
	<!--Link dos arquivos CSS e JS do Bootstrap-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</head>

<body>

	<?php
	include "jogo.php";
	include "jogoview.php";
	include "jogolista.php";
	include "conexao.php";

	$con = Conexao::getConexao();



	?>

	<div class="container">
		<div class="row text-center" id="titulo">
			<div class="col-md-12">
				<h1>Jogos</h1>
			</div>
		</div>

		<?php
				$lista = new JogoLista();
				$lista->carregarJogos();

				$jogolista = $lista->getJogoLista();
		
				foreach($jogolista as $jogo){
					JogoView::gerarCard($jogo);
				}
		?>

	</div>
</body>

</html>