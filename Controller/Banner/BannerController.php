<?php
    namespace Controller\Banner;

    use Model\Banners\Banner as Banner;
    use src\Traits\MensagemTrait;
    use src\View\View;

class BannerController
{
    public static $active = 'actPaginas';

    public static function listing($dados = "", $id = 0)
    {
        $banner  = new Banner();
        $banners = $banner->lista();
        View::mountPage('Banner', 'Listar', self::$active, $banners);
    }

    public static function update($dados = "", $id = 0)
    {
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $banner   = new Banner;
            $validate = $banner->validaDados($dados);

            if ($validate != "true") {
                MensagemTrait::set($validate, "danger");
                View::redirect('banner/insert');
            } else {
                $dados['foto'] = '';

                if (!empty($_FILES['foto']['name'])) {
                    self::removeFoto('foto');
                    $dados['foto'] = self::uploadFoto('foto');
                } else {
                    $dados['foto'] = $dados['bannerOld'];
                }

                if ($banner->update($dados)) {
                    MensagemTrait::set("Banner alterado com sucesso", "success");
                } else {
                    MensagemTrait::set("Ocorreram erros durante a solicitacao", "danger");
                }

                View::redirect('banner/listing');
            }
        } else {
            self::select($id);
        }
    }

    public static function delete($dados = "", $id = 0)
    {
        if ($id > 0) {
            $banner = new Banner();

            if ($banner->delete($id)) {
                MensagemTrait::set("Banner removido com sucesso", "success");
            } else {
                MensagemTrait::set("Ocorreram erros durante a solicitacao", "danger");
            }
        }

        View::redirect('banner/listing');
    }

    public static function insert($dados = "", $id = 0)
    {
        if (isset($dados['titulo']) && !empty($dados['titulo'])) {
            $banner   = new Banner;
            $validate = $banner->validaDados($dados);

            if ($validate != "true") {
                MensagemTrait::set($validate, "danger");
                View::redirect('banner/insert');
            } else {
                $dados['foto'] = '';

                if (!empty($_FILES['foto'])) {
                    $dados['foto'] = self::uploadFoto('foto');
                }

                if ($banner->insert($dados)) {
                    MensagemTrait::set("Banner inserido com sucesso", "success");
                } else {
                    MensagemTrait::set("Ocorreram erros durante a solicitacao", "danger");
                }

                View::redirect('banner/listing');
            }
        } else {
            View::mountPage('Banner', 'Cadastrar', self::$active, []);
        }
    }

    public static function select($id)
    {
        $banner = new Banner();
        $dados  = $banner->select($id);

        View::mountPage('Banner', 'Editar', self::$active, $dados);
    }

    // Faz o upload da foto e retorna sucesso ou falso
    public static function uploadFoto($tipo)
    {
        $banner = new Banner;
        $foto   = $banner->uploadFoto($tipo);

        if ($foto['status'] == "success") {
            return $foto['msg'];
        } else {
            MensagemTrait::set("Ocorreram erros durante a solicitacao", "danger");
            View::redirect('banner/listing');
        }
    }

    // apaga a foto no ftp
    public static function removeFoto($url)
    {
        if (file_exists('uploads/banners/'.$url.'jpg')) {
            unlink('uploads/banners/'.$url.'jpg');
        }
        
        if (file_exists('uploads/banners/'.$url.'jpeg')) {
            unlink('uploads/banners/'.$url.'jpeg');
        }

        if (file_exists('uploads/banners/'.$url.'png')) {
            unlink('uploads/banners/'.$url.'png');
        }
    }
}
