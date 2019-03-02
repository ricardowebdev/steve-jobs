<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerência Fácil</title>
    <link rel="stylesheet" href="src/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/assets/css/mdb.min.css">
    <link rel="stylesheet" href="src/assets/css/datatables.min.css">
    <link rel="stylesheet" href="src/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="src/assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="src/assets/css/bootstrap-tour.min.css">
    <link rel="stylesheet" href="src/assets/css/style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="mb-1 navbar navbar-expand-lg navbar-dark info-color">
                    <a class="navbar-brand" href="index.php">
                        <img src="uploads/logo/logo.jpg" alt="Logotipo da empresa" height="25px">
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="basicExampleNav">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item <?= $actInicio; ?>">
                                <a class="nav-link" href="index.php" id="dashboard-menu">
                                    <b><i class="fa fa-tachometer"></i> DashBoard</b>
                                </a>
                            </li>

                            <li class="nav-item dropdown" id="cadastros">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <b><i class="fa fa-list"></i> Cadastros</b>
                                </a>
                                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="index.php?r=produto/listing">
                                        <b><i class="fa fa-shopping-cart"></i> Produtos</b>
                                    </a>

                                    <a class="dropdown-item" href="index.php?r=cliente/listing">
                                        <b><i class="fa fa-users"></i> Clientes</b>
                                    </a>

                                    <a class="dropdown-item" href="index.php?r=categoria/listing">
                                        <b><i class="fa fa-object-group"></i> Categorias</b>
                                    </a>

                                    <a class="dropdown-item" href="index.php?r=mailing/listing">
                                        <b><i class="fa fa-envelope-o"></i> Mailings</b>
                                    </a>

                                    <a class="dropdown-item" href="index.php?r=fornecedor/listing">
                                        <b><i class="fa fa-industry"></i> Fornecedores</b>
                                    </a>


                                    <a class="dropdown-item" href="index.php?r=condicaopagamento/listing">
                                        <b><i class="fa fa-money"></i> Condições de pagamento</b>
                                    </a>                                    

                                    <a class="dropdown-item" href="index.php?r=usuario/listing">
                                        <b><i class="fa fa-male"></i> Usuarios</b>
                                    </a>
                                </div>
                            </li>

                            <li class="nav-item dropdown" id="financeiro">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <b><i class="fa fa-money"></i> Financeiro</b>
                                </a>
                                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="index.php?r=venda/listing">
                                        <b><i class="fa fa-handshake-o"></i> Vendas</b>
                                    </a>

                                    <a class="dropdown-item" href="index.php?r=fluxoCaixa/listing">
                                        <b><i class="fa fa-line-chart"></i> Fluxo de caixa</b>
                                    </a>
                                </div>
                            </li>

                            <!-- <li class="nav-item dropdown" id="gerencia">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <b><i class="fa fa-star-o"></i> Gerencia do Site</b>
                                </a>
                                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="index.php?r=empresa/listing">
                                        <b><i class="fa fa-building"></i> Empresa</b>
                                    </a>

                                    <a class="dropdown-item" href="index.php?r=pagina/listing">
                                        <b><i class="fa fa-chrome"></i> Paginas</b>
                                    </a>

                                    <a class="dropdown-item" href="index.php?r=banner/listing">
                                        <b><i class="fa fa-picture-o"></i> Banners</b>
                                    </a>
                                </div>
                            </li> -->

                            <li class="nav-item">
                                <a class="nav-link" onclick="tour('dashboard')">
                                    <b><i class="fa fa-plane"></i> Ajuda</b>
                                </a>
                            </li>                            

                            <li class="nav-item">
                                <a class="nav-link" href="index.php?r=autentica/logoff">
                                    <b><i class="fa fa-sign-out"></i> Sair</b>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link">
                                    <b><i class="fa fa-user"></i> Olá <?= $_SESSION['user']; ?> | Data: <?php echo date('d/m/Y'); ?></b>
                                </a>
                            </li>                            
                        </ul>

                    </div>
                </nav>                
            </div>
        </div>
    </div>
    <?php
        use src\Traits\MensagemTrait;
        
        MensagemTrait::get();
    ?>    
