<?php

 class JogoView{

    public static function gerarCard($jogo){

        $nomeJogo = $jogo->getNome();
        $descricaoJogo = $jogo->getDescricao();
        $generoJogo = $jogo->getGenero();
        $desenvolvedorJogo = $jogo->getDesenvolvedor();
        $notaJogo = $jogo->getNota();
        $fotoJogo = $jogo->getFoto();
        $destribuidoraJogo = $jogo->getDestribuidora();

        
        echo "
        <div class='row text-center'>

        <div style='background-color: rgba(0,0,0,0.9); color: white; margin-top: 20px;'>

            <div class='col-md-12'>

                <img style='width: 100%; margin-bottom: 30px; border-bottom: 1px solid black; margin-top: 20px;' src='img/darksouls.jpg'>

                <br>
                <h2 style='font-size: 1.9em;'>$nomeJogo</h2>
                <br>
                <p style='font-size:0.8em; text-align: center;'>$descricaoJogo</p>
                <br>
                <p>Genero: $generoJogo</p>
                <p>Nota: $notaJogo</p>
                <br>
                <p>Desenvolvedor: $desenvolvedorJogo </p>
                <p>Destribuidora: $destribuidoraJogo</p>

            </div>

        </div>

    </div>
        
           ";
        
    }

 }

?>