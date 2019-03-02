<?php

namespace Model\Usuarios;

use Helpers\BaseModel;

class Usuario extends BaseModel
{
    private $id;
    private $nome;
    private $email;
    private $senha;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

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

    public function validaDados($dados)
    {
        if (!isset($dados['nome']) && empty($dados['nome'])) {
            $message = "Nome do usuário não pode ficar em branco";
        } else if (!isset($dados['email']) && empty($dados['email'])) {
            $message = "E-mail do usuário não pode ficar em branco";
        } else if (!isset($dados['senha']) && empty($dados['senha'])) {
            $message = "Senha do usuário não pode ficar em branco";
        } else {
            return "true";
        }
    }

    public function getParams($update = false)
    {
        if ($update) {
            $params  = array("nome", "email", "senha", "id");
        } else {
            $params  = array("nome", "email", "senha");
        }
        return $params;
    }

    public function lista()
    {
        $params   = $this->getParams("true");
        $sql      = $this->listing("usuarios", $params);
        $result   = $this->executaQuery($sql, [], [], "True");
        $usuarios = [];

        foreach ($result as $dados) {
            $usuario = new Usuario;
            $usuario->setId($dados['id']);
            $usuario->setNome($dados['nome']);
            $usuario->setEmail($dados['email']);
            $usuario->setSenha($dados['senha']);

            $usuarios[] = $usuario;
        }

        return $usuarios;
    }

    public function update($dados)
    {
        $params = $this->getParams(true);
        $sql    = $this->edit("usuarios", $params);
        return $this->executaQuery($sql, $params, $dados);
    }

    public function select($id)
    {
        $params = $this->getParams("true");
        $sql    = $this->listing("usuarios", $params, "id =".$id);
        $result = $this->executaQuery($sql, [], [], "True");
        $usuario;

        foreach ($result as $dados) {
            $usuario = new Usuario();
            $usuario->setId($dados['id']);
            $usuario->setNome($dados['nome']);
            $usuario->setEmail($dados['email']);
            $usuario->setSenha($dados['senha']);
        }

        return $usuario;
    }

    public function delete($id)
    {
        $sql = $this->erase("usuarios", $id);
        return $this->executaQuery($sql, [], []);
    }

    public function insert($dados)
    {
        $params = $this->getParams();
        $sql    = $this->store("usuarios", $params);
        return $this->executaQuery($sql, $params, $dados);
    }

    public function verifyMail($dados)
    {
        $params = $this->getParams("true");
        $sql    = $this->listing("usuarios", ["id"], "email ='".$dados['email']."'");
        $result = $this->executaQuery($sql, [], [], "True");
        $count  = 0;

        foreach ($result as $dados) {
            $count = $dados['id'];
        }

        return $count;
    }
}
