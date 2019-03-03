<?php
    namespace Controller\Job;

    use Model\Jobs\Job as Job;
    use src\Traits\MensagemTrait;
    use src\View\View;

class JobController
{
    public static $active = 'Job';

    public static function listing($dados = "", $id = 0)
    {
        $job  = new Job();
        $jobs = $job->lista();
        View::mountPage('Job', 'Listar', self::$active, $jobs);
    }

    public static function update($dados = "", $id = 0)
    {
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $job   = new Job;
            $validate = $job->validaDados($dados);

            if ($validate != "true") {
                MensagemTrait::set($validate, "danger");
                View::redirect('job/insert');
            } else {
                if ($job->update($dados)) {
                    MensagemTrait::set("Job alterado com sucesso", "success");
                } else {
                    MensagemTrait::set("Ocorreram erros durante a solicitacao", "danger");
                }

                View::redirect('job/listing');
            }
        } else {
            self::select($id);
        }
    }

    public static function delete($dados = "", $id = 0)
    {
        if ($id > 0) {
            $job = new Job();

            if ($job->delete($id)) {
                MensagemTrait::set("Job removido com sucesso", "success");
            } else {
                MensagemTrait::set("Ocorreram erros durante a solicitacao", "danger");
            }
        }

        View::redirect('job/listing');
    }

    public static function insert($dados = "", $id = 0)
    {
        if (isset($dados['nome']) && !empty($dados['nome'])) {
            $job   = new Job;
            $validate = $job->validaDados($dados);

            if ($validate != "true") {
                MensagemTrait::set($validate, "danger");
                View::redirect('job/insert');
            } else {
                if ($job->insert($dados)) {
                    MensagemTrait::set("Job inserido com sucesso", "success");
                } else {
                    MensagemTrait::set("Ocorreram erros durante a solicitacao", "danger");
                }

                View::redirect('job/listing');
            }
        } else {
            View::mountPage('Job', 'Cadastrar', self::$active, []);
        }
    }

    public static function select($id)
    {
        $job = new Job();
        $dados  = $job->select($id);

        View::mountPage('Job', 'Editar', self::$active, $dados);
    }
}
