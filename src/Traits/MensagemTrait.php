<?php

namespace src\Traits;

trait MensagemTrait
{
    public static function set($mensagem, $tipo)
    {
        $_SESSION['mensagem'][] = array("msg"  => $mensagem,
                                        "tipo" => $tipo);
    }

    public static function get()
    {
        if (isset($_SESSION['mensagem'])) {
            foreach ($_SESSION['mensagem'] as $msg) {
                $mensagem = $msg['msg'];
                $tipo     = $msg['tipo'];


                $html = '<div class="alert alert-'.$tipo.' alert-dismissible " role="alert">
				    		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						    <span class="sr-only">Error:</span>'.$mensagem.'
				         </div>';

                echo $html;
            }

            self::limpar();
        }
    }

    public static function limpar()
    {
        unset($_SESSION['mensagem']);
    }
}
