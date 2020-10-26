<!DOCTYPE html>
<html lang="pt-br">

<head>
	<!--Tags básicas do head-->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de jogos</title>
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
        include_once "jogo.php";
        include_once "jogoDAO.php";

        session_start();
        if(!isset($_SESSION["modo"])){
            $_SESSION["modo"] = 0;
        }
        
        if(isset($_GET["botaoAcao"])){
            if($_GET["botaoAcao"]=="Gravar"){
                $pAux = new Jogo(
                    null,
                    $_GET["nome"],
                    $_GET["descricao"],
                    $_GET["genero"],
                    $_GET["desenvolvedor"],
                    $_GET["nota"],
                    null,
                    $_GET["destribuidora"]
                );
                if($_SESSION["modo"]==1)
                    JogoDAO::inserir($pAux);
                else
                    JogoDAO::atualizar($pAux);
            } else if($_GET["botaoAcao"]=="Excluir"){
                    JogoDAO::excluir($_GET["nome"]);
            }

            if(isset($_GET["botaoAcao"])){
                if($_GET["botaoAcao"]=="Excluir" || $_GET["botaoAcao"]=="Inserir"){
                    $_SESSION["modo"] = 1;
                } else {
                    $_SESSION["modo"] = 2;
                }
            }

        }

    ?>


    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h1>Cadastro de Pokemons</h1>
            </div>
        </div>

        <form method="get" action="cadastro.php">

        <div class="row text-center">
            <div class="col-md-2 offset-md-2">
                <input type="submit" name="botaoAcao" value="Inserir" class="btn btn-primary"/>
            </div>
            <div class="col-md-2">
                <input type="submit" name="botaoAcao" value="Gravar" class="btn btn-success"/>
            </div>
            <div class="col-md-2">
                <input type="submit" name="botaoAcao" value="Excluir" class="btn btn-danger"/>
            </div>
            <div class="col-md-2">
                <input type="submit" name="botaoAcao" value="Cancelar" class="btn btn-warning"/>
            </div>
        </div>

        <br><br>
        <div class="row cadastro" style="background-color: rgba(0, 0, 0, 0.5); color: white" id="areaCadastro">
            <div class="col-md-4 offset-md-4">
                <label for="nome">Nome</label>
                <input type="text" name="nome" value= <?php if($_SESSION["modo"]==2) echo $_GET["nome"]; else echo ""; ?>   >
            </div>
            <div class="col-md-4 offset-md-4">
                <label for="descricao">Descrição</label>
                <input type="text" name="descricao" value= <?php if($_SESSION["modo"]==2) echo $_GET["descricao"]; else echo ""; ?>   >
            </div>
            <div class="col-md-4 offset-md-4">
                <label for="genero">Gênero</label>
                <input type="text" name="genero" value= <?php if($_SESSION["modo"]==2) echo $_GET["genero"]; else echo ""; ?>   >
            </div>
            <div class="col-md-4 offset-md-4">
               <label for="desenvolvedor">Desenvolvedor</label>
                <input type="text" name="desenvolvedor" value= <?php if($_SESSION["modo"]==2) echo $_GET["desenvolvedor"]; else echo ""; ?>   >
            </div>
            <div class="col-md-4 offset-md-4">
                <label for="nota">Nota</label>
                <input type="text" name="nota" value= <?php if($_SESSION["modo"]==2) echo $_GET["nota"]; else echo ""; ?>   >
            </div>
            <div class="col-md-4 offset-md-4">
                <label for="destribuidora">Destribuidora</label>
                <input type="text" name="destribuidora" value= <?php if($_SESSION["modo"]==2) echo $_GET["destribuidora"]; else echo ""; ?>   >
            </div>

        </div>

        </form>


    </div>


</body>