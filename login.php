<html>
    <head>
        <title>Steve - Jobs</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="src/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="src/assets/css/mdb.min.css">
        <link rel="stylesheet" type="text/css" href="src/assets/css/style.css">
    </head>
    <body style="margin: 0px; padding: 0px">
        <div class="container-fluid" style="width: 100%; margin: 0px; padding: 0px">
            <div class="row page-header">
                <div class="col-12 text-center">
                    <h1 style="color: white;"><b>Gerênciador de Jobs Steve</b></h1>
                </div>
            </div>
        </div>

        <?php
            session_start();
            require_once "src/Traits/MensagemTrait.php";
            use src\Traits\MensagemTrait;

            MensagemTrait::get();
        ?>

        <form method="POST" action="index.php">
            <div class="container" style="margin-top: 200px;">
                <div class="row align-items-center">                    
                    <div class="col-md-6 offset-md-3 card img-fluid z-depth-1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h1><b>Login</b></h1>
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="md-form">
                                        <label for="email"><b>E-mail</b></label>
                                        <input type="text" name="email" id="email" class="form-control" required>
                                    </div>
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="md-form">
                                        <label for="senha"><b>Senha</b></label>
                                        <input type="password" name="senha" id="senha" class="form-control" required>
                                    </div>
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-primary form-control"><b>Login</b></button>
                                </div>
                            </div><br>
                        </div>
                    </div>
                    <div class="col">&nbsp;</div>
                </div>
            </div>
        </form>
        <script type="text/javascript" src="src/assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="src/assets/js/popper.min.js"></script>
        <script type="text/javascript" src="src/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="src/assets/js/mdb.min.js"></script>
    </body>
</html>