<?php
    namespace Controller\Usuario;

    use Model\Usuarios\Usuario as Usuario;
    use src\Traits\MensagemTrait;
    use src\View\View;

class UsuarioController
{
    public static $active = 'actUsuarios';

    public static function listing($dados = "", $id = 0)
    {
        $usuario  = new Usuario();
        $usuarios = $usuario->lista();

        View::mountPage('Usuario', 'Listar', self::$active, $usuarios);
    }

    public static function update($dados, $id = 0)
    {
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $usuario  = new Usuario;
            $validate = $usuario->validaDados($dados);

            if ($validate != "true") {
                MensagemTrait::set($validate, "danger");
                View::redirect('usuario/insert');
            } else {
                if ($dados['senha'] != $dados['senhaOld']) {
                    $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
                } else {
                    $dados['senha'] = $dados['senhaOld'];
                }

                if ($usuario->update($dados)) {
                    MensagemTrait::set("Usuário alterado com sucesso", "success");
                } else {
                    MensagemTrait::set("Ocorreram erros durante a solicitacao", "danger");
                }

                View::redirect('usuario/listing');
            }
        } else {
            self::select($id);
        }
    }

    public static function delete($dados = "", $id = 0)
    {
        if ($id > 0) {
            $usuario = new Usuario();

            if ($usuario->delete($id)) {
                MensagemTrait::set("Usuario removido com sucesso", "success");
            } else {
                MensagemTrait::set("Ocorreram erros durante a solicitacao", "danger");
            }
        }

        View::redirect('usuario/listing');
    }

    public static function insert($dados = "", $id = 0)
    {
        if (isset($dados['nome']) && !empty($dados['nome'])) {
            $usuario  = new Usuario;
            $validate = $usuario->validaDados($dados);

            if ($validate != "true") {
                MensagemTrait::set($validate, "danger");
                View::redirect('usuario/insert');
            } else {
                $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);

                if ($usuario->insert($dados)) {
                    MensagemTrait::set("Usuario inserido com sucesso", "success");
                } else {
                    MensagemTrait::set("Ocorreram erros durante a solicitacao", "danger");
                }

                View::redirect('usuario/listing');
            }
        } else {
            View::mountPage('Usuario', 'Cadastrar', self::$active);
        }
    }

    public static function select($id)
    {
        $usuario = new Usuario();
        $usuario = $usuario->select($id);

        View::mountPage('Usuario', 'Editar', self::$active, $usuario);
    }

    public static function verifyMail($dados)
    {
        $usuario = new Usuario();
        $usuario->verifyMail($dados);

        return json_encode($count);
    }
}
