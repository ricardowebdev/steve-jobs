<?php
namespace Model\Banners;

use Helpers\BaseModel;
use src\Traits\MensagemTrait;
use Helpers\Validation;

class Banner extends BaseModel
{
    private $id;
    private $titulo;
    private $foto;
    private $texto;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setTexto($texto)
    {
        $this->texto = $texto;
    }

    public function getTexto()
    {
        return $this->texto;
    }

    public function validaDados($dados)
    {
        if (!isset($dados['titulo']) || empty($dados['titulo'])) {
            return "Empresa não pode ficar em branco";
        } else {
            return "true";
        }
    }

    public function uploadFoto($tipo)
    {
        // pegando o tipo de upload
        $ext = strtolower(substr($_FILES[$tipo]['name'], -4));
        
        if ($ext == 'jpeg') {
            $ext = '.jpeg';
        }

        if ($ext != '.jpg' && $ext != '.png' && $ext != '.jpeg') {
            return $result = array("status" => "error",
                                   "msg"    => "Extensão do Arquivo não é valida");
        } else {
            $new_name = $tipo.date('y-m-d-h-i-s').'.jpg';
            $dir      = 'uploads/banners/';

            //Fazer upload do arquivo
            if (move_uploaded_file($_FILES[$tipo]['tmp_name'], $dir.$new_name)) {
                return $result = array("status" => "success",
                                       "msg"    => $new_name);
            } else {
                return $result = array("status" => "error",
                                       "msg"    => "Ocorreram Erros durante o upload da foto");
            }
        }
    }

    public function getParams($update = false)
    {
        if ($update) {
            $params  = array("titulo", "foto", "texto", "id");
        } else {
            $params  = array("titulo", "foto", "texto");
        }

        return $params;
    }

    public function lista($dados = null)
    {
        $params  = $this->getParams("true");
        $sql     = $this->listing("banners", $params);
        $result  = $this->executaQuery($sql, [], [], "True");
        $banners = [];

        foreach ($result as $dados) {
            $banner = new Banner();
            $banner->setId($dados['id']);
            $banner->setTitulo($dados['titulo']);
            $banner->setFoto($dados['foto']);
            $banner->setTexto($dados['texto']);

            $banners[] = $banner;
        }

        return $banners;
    }

    public function insert($dados)
    {
        $params = $this->getParams();
        $sql    = $this->store("banners", $params);
        return $this->executaQuery($sql, $params, $dados);
    }

    public function update($dados)
    {
        $params = $this->getParams(true);
        $sql    = $this->edit("banners", $params);
        return $this->executaQuery($sql, $params, $dados);
    }

    public function delete($id)
    {
        $sql = $this->erase("banners", $id);
        return $this->executaQuery($sql, [], []);
    }

    public function select($id)
    {
        $params = $this->getParams("true");
        $sql    = $this->listing("banners", $params, "id =".$id);
        $result = $this->executaQuery($sql, [], [], "True");
        $banner;

        foreach ($result as $dados) {
            $banner = new Banner();
            $banner->setId($dados['id']);
            $banner->setTitulo($dados['titulo']);
            $banner->setFoto($dados['foto']);
            $banner->setTexto($dados['texto']);
        }

        return $banner;
    }
}
