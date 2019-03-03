<?php
namespace Controller\Cron;

use Model\Jobs\Job as Job;
use Model\ChatBots\ChatBot as ChatBot;
use Model\Scripts\Script as Script;
use src\Traits\MensagemTrait;
use src\View\View;

class CronController
{
    public static $active = 'Job';

    public static function listing($dados = "", $id = 0)
    {
        $job  = new Job();
        $jobs = $job->lista();

        foreach ($jobs as $job) {
            $result = self::verificaExecucao($job);

            if ($result) {
                self::executeJob($job);
                $job->updateTime();
            }
        }
    }


    /*
     * Função para verificar se o Job deve ser executado
     * de acordo com o dia, hora, e o datetime da ultima execucao
     */
    public static function verificaExecucao($job)
    {
        $result = false;

        if ($job->getDtExecucao() === "") {
            $time = "";
        } else {
            $time = strtotime($job->getDtExecucao()) + 60 * 60;
            $time = date("Y-m-d H:i", $time);
        }

        if ($job->getDiaMes() === "*" ||
            $job->getDiaMes() === date("d")) {
            if ($job->getHora() === "/1" ||
                $job->getHora() === date('H')) {
                if ($time === "" ||
                    $time < date("Y-m-d H:i")) {
                    $result = true;
                }
            }
        }

        return $result;
    }

    /*
     * Define se irá enviar os dados para os scripts ou
     * apenas enviar uma simples mensagem para o chatbot do telegram
     */
    public static function executeJob($job)
    {
        if ($job->getTipo() === "L") {
            $chatBot = new ChatBot();
            $chatBot->executeJob($job);
        } else {
            $script = new Script();
            $script->executaJob($job);
        }
    }
}
