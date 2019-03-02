<?php
    namespace Controller\Autentica;

    use Model\Empresas\Empresa as Empresa;
    use Model\Autenticacoes\Autenticacao as Autenticacao;
    use src\Traits\MensagemTrait;
    use src\View\View;

class AutenticaController
{

    public static function autentica()
    {

        if (!isset($_SESSION['tkLogged'])) {
            $autenticado = new Autenticacao();

            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

            $autenticado->setEmail($email);
            $autenticado->setSenha($senha);

            if ($autenticado->login()) {
                $_SESSION['tkLogged'] = self::generateToken($autenticado->getSenha());
                return true;
            } else {
                session_destroy();
                session_start();

                if (!empty($_POST['email']) || !empty($_POST['senha'])) {
                    MensagemTrait::set("Usuario e ou senha incorretos", "danger");
                }

                View::notLogged();
            }
        } else {
            return true;
        }
    }

    public static function generateToken($senha)
    {
        $token = password_hash($senha, PASSWORD_DEFAULT);
        return $token;
    }

    public static function error()
    {
        return View::mountPage('Helper', '404', "");
    }

    public static function logoff()
    {
        session_destroy();
        View::notLogged();
    }
}
