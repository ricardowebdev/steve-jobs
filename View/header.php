<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Steve Jobs</title>
    <link rel="stylesheet" href="src/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/assets/css/mdb.min.css">
    <link rel="stylesheet" href="src/assets/css/datatables.min.css">
    <link rel="stylesheet" href="src/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="src/assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="src/assets/css/bootstrap-tour.min.css">
    <link rel="stylesheet" href="src/assets/css/style.css">
</head>
<body>    
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
                                <b><i class="fa fa-tachometer"></i> Tarefas</b>
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
    <?php
        use src\Traits\MensagemTrait;
        
        MensagemTrait::get();
    ?>    
