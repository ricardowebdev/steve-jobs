<?php

namespace Model\ChatBots;

use src\Conexao\Conexao;

class ChatBot extends Conexao
{
    private $url;
    private $token;

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url.$this->getToken();
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function __construct()
    {
        $this->con = self::getInstance();
        $this->readToken();
        $this->setUrl("https://api.telegram.org/bot");
    }

    public function readToken()
    {
        $dados = file_get_contents('env.json');
        $dados = json_decode($dados);
        $this->setToken($dados->token_bot);
    }

    public function executeJob($job)
    {
        $chatId = $this->getChatId();
        $msg    = $this->urlMessage($job->getInstrucao());
        $myurl  = $this->getUrl().'/sendmessage?chat_id='.$chatId."&text=".$msg;
        file_get_contents($myurl);
    }

    public function getChatId()
    {
        $update   = file_get_contents($this->getUrl().'/getUpdates');
        $update   = json_decode($update, true);
        $lastChat = array_pop($update["result"]);
        $chatId   = $lastChat['message']['chat']['id'];

        return $chatId;
    }

    public function urlMessage($message)
    {
        $message = str_replace(" ", "%20", $message);
        return $message;
    }

    public function answerFromJob($job, $message)
    {
        $chatId = $this->getChatId();
        $myurl  = $this->getUrl().'/sendmessage?chat_id='.$chatId."&text=".$message;
        file_get_contents($myurl);
    }
}
