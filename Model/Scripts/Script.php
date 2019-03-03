<?php

namespace Model\Scripts;

use src\Conexao\Conexao;
use Model\ChatBots\ChatBot as ChatBot;

class Script extends Conexao
{
    public function __construct()
    {
        $this->con = self::getInstance();
    }
    
    public function executaJob($job)
    {
        $file = 'scripts/'.$job->getScript().".php";
        require_once $file;

        $chatbot = new ChatBot();
        return $chatbot->answerFromJob($job, $msg);
    }
}
