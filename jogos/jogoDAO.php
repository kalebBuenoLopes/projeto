<?php

include "conexao.php";

    class JogoDAO{
        
        public static function inserir($jogo){
            $con = Conexao::getConexao();
            $sql = $con->
                prepare("insert into jogos values (null,?,?,?,?,?,'',?)");
            
            $nome = $jogo->getNome();
            $descricao = $jogo->getDescricao();
            $genero = $jogo->getGenero();
            $desenvolvedor = $jogo->getDesenvolvedor();
            $nota = $jogo->getNota();
            $destribuidora = $jogo->getDestribuidora();
            
            $sql->bindParam(1, $nome);
            $sql->bindParam(2, $descricao);
            $sql->bindParam(3, $genero);
            $sql->bindParam(4, $desenvolvedor);
            $sql->bindParam(5, $nota);
            $sql->bindParam(6, $destribuidora);
            
            $sql->execute();
        }

        public static function excluir($jogo){
            $con = Conexao::getConexao();
           
            $sql = null;
            if(is_numeric($jogo)){
                $sql=$con->prepare("delete from jogos where idjogo = ?");
                $sql->bindParam(1, $jogo);
            } else if(is_string($jogo)){
                $sql=$con->prepare("delete from jogos where nome = ?");
                $sql->bindParam(1, $jogo);
            } else {
                $nome = $jogo->getNome();
                $sql=$con->prepare("delete from jogos where nome = ?");
                $sql->bindParam(1, $nome);
            }
            $sql->execute();  
        }

        public static function atualizar($jogo){
            $con = Conexao::getConexao();

            $codigo = $jogo->getIdJogo();
            $nome = $jogo->getNome();
            $descricao = $jogo->getDescricao();
            $genero = $jogo->getGenero();
            $desenvolvedor = $jogo->getDesenvolvedor();
            $nota = $jogo->getNota();
            $destribuidora = $jogo->getDestribuidora();
            $foto = "";

            if($codigo>0){
                $sql = $con->prepare("update jogos set nome=?, descricao=?, 
                genero=?, desenvolvedor=?, nota=?, foto=?, destribuidora=? where idjogo=?");
                $sql->bindParam(7, $codigo);
            } else {
                $sql = $con->prepare("update jogos set nome=?, descricao=?, 
                genero=?, desenvolvedor=?, nota=?, foto=?, destribuidora=? where nome=?");
                $sql->bindParam(8, $nome);
            }

            $sql->bindParam(1, $nome);
            $sql->bindParam(2, $descricao);
            $sql->bindParam(3, $genero);
            $sql->bindParam(4, $desenvolvedor);
            $sql->bindParam(5, $nota);
            $sql->bindParam(6, $foto);
            $sql->bindParam(7, $destribuidora);
            

            $sql->execute();
            
        }

        public static function getJogo($identificacao){
            $con = Conexao::getConexao();
            $sql = null;

            if(is_numeric($identificacao)){
                $sql = $con->prepare("select * from jogos where idjogo=?");
                $sql->bindParam(1, $identificacao);
            } else {
                $sql = $con->prepare("select * from jogos where idjogo=?");
                $sql->bindParam(1, $identificacao);
            }

            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $sql->execute();

            $jogo = null;
            if($registro = $sql->fetch()){
                $jogo = new Jogo(
                    $registro["idjogo"],
                    $registro["nome"],
                    $registro["descricao"],
                    $registro["genero"],
                    $registro["desenvolvedor"],
                    $registro["nota"],
                    $registro["foto"],
                    $registro["destribuidora"]
                );
            }

            return $jogo;

        }

        public static function getJogos($campo, $ordem){
            $con = Conexao::getConexao();
            $sql = $con->prepare("select * from jogos order by ? ?");
            $sql->bindParam(1, $campo);
            $sql->bindParam(2, $ordem);
            
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $sql->execute();

            $jogoLista = array();

            while($registro = $sql->fetch()){
                $jogo = new Jogo(
                    $registro["idjogo"],
                    $registro["nome"],
                    $registro["descricao"],
                    $registro["genero"],
                    $registro["desenvolvedor"],
                    $registro["nota"],
                    $registro["foto"],
                    $registro["destribuidora"]
                );
                $jogoLista[] = $jogo;
            }

            return $jogoLista;
        }

    }

?>