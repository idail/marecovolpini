<?php
class Conexao{
    private $conexao;

    public function conecta()
    {
        if($this->conexao === null)
        {
            try{
                $this->conexao = new PDO("mysql:dbname=marecovolpini;host=mysql.marecovolpini.srv.br","marecovolpini","brasil2022");
                // $this->conexao = new PDO("mysql:dbname=marecovolpini;host=localhost","root","");
                return $this->conexao;
            }catch(PDOException $exception)
            {
                return $exception->getMessage();
            }catch(Exception $excecao)
            {
                return $excecao->getMessage();
            }
        }else
        {
            return $this->conexao;
        }
    }
}
?>