<?php

    class JogoLista{

        private $jogoLista = array();

        public function carregarJogos(){

            $j1 = new Jogo(
                null,
                "DARK SOULS: REMASTERED",
                "Mas então, fez-se o fogo. Experimente novamente o jogo aclamado pela crítica e definidor de gênero que foi o início tudo. Belamente remasterizado, volte a Lordran com detalhes em alta definição a 60fps.",
                "Ação",
                "QLOC",
                "9,2",
                "darksouls.jpg",
                "FromSoftware, Inc, BANDAI NAMCO Entertainment"
            );
            $this->jogoLista[]=$j1;

        }

        public function getJogoLista(){
            return $this->jogoLista;
        }

    }

?>