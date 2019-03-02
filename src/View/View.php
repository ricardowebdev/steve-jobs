<?php

namespace src\View;

use src\Conexao\Conexao;

use Controller\Banners\BannerController;

class View
{
    const HEADER = 'View/header.php';
    const FOOTER = 'View/footer.php';
    const MODAL  = 'View/modal.php';


    public static function mountPage($view, $arquivo, $page, $dados = "")
    {
        $actProdutos     = $page == 'actProdutos'     ? 'active' : '';
        $actEmpresas     = $page == 'actEmpresas'     ? 'active' : '';
        $actUsuarios     = $page == 'actUsuarios'     ? 'active' : '';
        $actPaginas      = $page == 'actPaginas'      ? 'active' : '';
        $actClientes     = $page == 'actClientes'     ? 'active' : '';
        $actVendas       = $page == 'actVendas'       ? 'active' : '';
        $actMailings     = $page == 'actMailings'     ? 'active' : '';
        $actCategorias   = $page == 'actCategorias'   ? 'active' : '';
        $actFornecedores = $page == 'actFornecedores' ? 'active' : '';
        $actInicio       = $page == 'actInicio'       ? 'active' : '';

        include self::HEADER;
        include 'View/'.$view.'/'.$arquivo.'.php';
        include self::MODAL;
        include self::FOOTER;
    }

    public static function redirect($route)
    {
        header("location: index.php?r=$route");
        exit();
    }

    public static function notLogged()
    {
        header("location: login.php");
        exit();
    }
}
