<?php
namespace Model\Jobs;

use Helpers\BaseModel;
use src\Traits\MensagemTrait;
use Helpers\Validation;

class Job extends BaseModel
{
    private $id;
    private $nome;
    private $descricao;
    private $script;
    private $diaMes;
    private $hora;
    private $dt_execucao;
    private $tipo;
    private $instrucao;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getScript()
    {
        return $this->script;
    }

    public function setScript($script)
    {
        $this->script = $script;
    }

    public function getDiaMes()
    {
        return $this->diaMes;
    }

    public function setDiaMes($diaMes)
    {
        $this->diaMes = $diaMes;
    }

    public function getHora()
    {
        return $this->hora;
    }

    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    public function getDtExecucao()
    {
        return $this->dt_execucao;
    }

    public function setDtExecucao($dt_execucao)
    {
        $this->dt_execucao = $dt_execucao;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getInstrucao()
    {
        return $this->instrucao;
    }

    public function setInstrucao($instrucao)
    {
        $this->instrucao = $instrucao;
    }

    public function validaDados($dados)
    {
        $validation = new Validation();
        $params     = array("nome"      => 'blank|min:3',
                            "diaMes"    => 'blank',
                            "hora"      => 'blank',
                            "instrucao" => 'blank');

        //$errors = $validation->validate($params, $dados);
        // $errors = true;
        // if ($errors !== null && count($errors) > 0) {
        //     foreach ($errors as $error) {
        //         MensagemTrait::set($error, "danger");
        //     }
        //     return false;
        // }
        
        return true;
    }

    public function getParams($update = false)
    {
        if ($update) {
            $params  = array("nome", "descricao", "script", "diaMes", "hora",
                             "dt_execucao", "tipo", "instrucao", "id");
        } else {
            $params  = array("nome", "descricao", "script", "diaMes", "hora",
                             "dt_execucao", "tipo", "instrucao");
        }

        return $params;
    }

    public function lista($dados = null)
    {
        $params  = $this->getParams("true");
        $sql     = $this->listing("jobs", $params);
        $result  = $this->executaQuery($sql, [], [], "True");
        $jobs    = [];

        if ($result) {
            foreach ($result as $dados) {
                $job = new Job();
                $job->setId($dados['id']);
                $job->setNome($dados['nome']);
                $job->setDescricao($dados['descricao']);
                $job->setScript($dados['script']);
                $job->setDiaMes($dados['diaMes']);
                $job->setHora($dados['hora']);
                $job->setDtExecucao($dados['dt_execucao']);
                $job->setTipo($dados['tipo']);
                $job->setInstrucao($dados['instrucao']);
                $jobs[] = $job;
            }
        }
        return $jobs;
    }

    public function insert($dados)
    {
        $params = $this->getParams();
        $sql    = $this->store("jobs", $params);
        return $this->executaQuery($sql, $params, $dados);
    }

    public function update($dados)
    {
        $params = $this->getParams(true);
        $sql    = $this->edit("jobs", $params);
        return $this->executaQuery($sql, $params, $dados);
    }

    public function delete($id)
    {
        $sql = $this->erase("jobs", $id);
        return $this->executaQuery($sql, [], []);
    }

    public function select($id)
    {
        $params = $this->getParams("true");
        $sql    = $this->listing("jobs", $params, "id =".$id);
        $result = $this->executaQuery($sql, [], [], "True");
        $job;

        foreach ($result as $dados) {
            $job = new Job();
            $job->setId($dados['id']);
            $job->setNome($dados['nome']);
            $job->setDescricao($dados['descricao']);
            $job->setScript($dados['script']);
            $job->setDiaMes($dados['diaMes']);
            $job->setHora($dados['hora']);
            $job->setDtExecucao($dados['dt_execucao']);
            $job->setTipo($dados['tipo']);
            $job->setInstrucao($dados['instrucao']);
        }

        return $job;
    }

    public function updateTime()
    {
        $sql = "UPDATE jobs SET dt_execucao = '".date("Y-m-d H:i")."' 
                WHERE id = ".$this->getId();

        $result = $this->executaQuery($sql, [], [], true);
            
        return $result;
    }
}
