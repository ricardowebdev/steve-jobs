<?php

namespace Model\Autenticacoes;

use src\Conexao\Conexao;

class Autenticacao extends Conexao
{
    private $email;
    private $senha;
    private $con;
    private $autenticado;

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function __construct()
    {
        $this->con = self::getInstance();
        $this->autenticado = false;
    }

    public function login()
    {
        $sql = "SELECT * FROM usuarios
			    WHERE email = :email";

        $prepare = $this->con->prepare($sql);
        $prepare->bindValue(":email", $this->email);
        $prepare->execute();
        $result = $prepare->fetchAll(\PDO::FETCH_ASSOC);


        foreach ($result as $dados) {
            if (password_verify($this->senha, $dados['senha'])) {
                $this->autenticado = true;
                $_SESSION['user']  = $dados['nome'];
            }
        }

        if ($this->autenticado === true) {
            return true;
        } else {
            return false;
        }
    }
}
