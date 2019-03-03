<?php

    namespace src\Conexao;

class Conexao
{
    public static $instance;
    public static $key    = 'Dexter';
    public static $header = ['typ' => 'JWT', 'alg' => 'HS256'];

    private function __construct()
    {
    }

    public static function readConnection()
    {
        $dados = file_get_contents('env.json');
        $dados = json_decode($dados);
        return $dados;
    }

    public static function getInstance()
    {
        $env = 'prod';

        if (!isset(self::$instance)) {
            if ($env == 'dev') {
                $dsn  = 'mysql:host=127.0.0.1;dbname=vitrine';
                $user = 'root';
                $pass = 'develop';
            } else {
                $dados = self::readConnection();
                $dsn   = $dados->dsn;
                $user  = $dados->user;
                $pass  = $dados->pass;
            }

            self::$instance = new \PDO($dsn, $user, $pass);
        }

        return self::$instance;
    }

    public static function getConectionDates()
    {
        $token = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/vitrine/connection.con');
        $dados = self::descriptToken($token);

        return $dados;
    }

    public static function descriptToken($token)
    {
        if ($token != "") {
            $token = str_replace("\\", "", $token);
            $dados = explode('.', $token);

            if (!isset($dados[1])) {
                return false;
            }

            $playload = base64_decode($dados[1]);
            $playload = json_decode($playload);

            if (isset($playload->dsn) && isset($playload->user)) {
                $dados = array("dsn"  => $playload->dsn,
                "user" => $playload->user,
                "pass" => $playload->pass);

                return $dados;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

        
    public static function generateToken($dsn, $pass, $user)
    {
        $header = json_encode(self::$header);
        $header = base64_encode($header);

        $payload = [
        'iss'  => 'ricardoDev.com.br',
        'dsn'  => $dsn,
        'pass' => $pass,
        'user' => $user
        ];

        $payload = json_encode($payload);
        $payload = base64_encode($payload);

        $signature = hash_hmac('sha256', "$header.$payload", self::$key, true);
        $signature = base64_encode($signature);

        return $token = "$header.$payload.$signature";
    }
}
