<?php
namespace Helpers;

class Validation
{
    public function validate($params, $dados)
    {

        $errors = null;

        foreach ($params as $key => $value) {
            // Primeiro valida se o campo existe
            if (!isset($dados[$key])) {
                $errors[] = "Campo ".$key." é obrigatório";
                continue;
            }

            $filters = explode("|", $value);
            foreach ($filters as $filter) {
                $param['value'] = trim(str_replace(" ", '', $param['value']));

                if ($filter == "string") {
                    if (!$this->string($param['value']) == "False") {
                        $errors[] = "Campo ".$key." não é do tipo caracter";
                    }
                }

                if ($filter == "blank") {
                    if ($this->blank($dados[$key]) == "False") {
                        $errors[] = "Campo ".$key." está branco";
                    }
                }

                if ($filter == "email") {
                    if ($this->email($dados[$key]) == "False") {
                        $errors[] = "Campo ".$key." não é um e-mail válido";
                    }
                }

                if ($filter == "url") {
                    if ($this->url($dados[$key]) == "False") {
                        $errors[] = "Campo ".$key." não é uma url válida";
                    }
                }

                if (substr($filter, 0, 3) == "min") {
                    $min = explode(':', $filter);
    
                    if ($this->min($dados[$key], $min[1]) == "False") {
                        $errors[] = "Campo ".$key." não atinge o minimo de caracteres";
                    }
                }

                if (substr($filter, 0, 3) == "max") {
                    $max = explode(':', $filter);
    
                    if ($this->max($dados[$key], $max[1]) == "False") {
                        $errors[] = "Campo ".$key." supera o maximo de caracteres";
                    }
                }
            }
        }
        return $errors;
    }

    public function numeric($param)
    {
        $result = is_numeric($param);

        return $result == 1 ? "True" : "False";
    }

    public function string($param)
    {
        $result = is_string($param);

        return $result == 1 ? "True" : "False";
    }

    public function blank($param)
    {
        return $param == '' ? "False" : "True";
    }

    public function email($param)
    {
        if (filter_var($param, FILTER_VALIDATE_EMAIL)) {
            return "True";
        } else {
            return "False";
        }
    }

    public function url($param)
    {
        if (filter_var($param, FILTER_VALIDATE_URL)) {
            return "True";
        } else {
            return "False";
        }
    }

    public function min($param, $min)
    {
        $len = strlen($param);
        return $len < $min ? "False" : "True";
    }

    public function max($param, $max)
    {
        $len = strlen($param);
        return $max > $len ? "True" : "False";
    }
}
