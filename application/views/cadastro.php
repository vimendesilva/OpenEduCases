<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Repositório de Casos</title>

        <!-- Bootstrap core CSS -->
        <link href="dist/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="dist/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="dist/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="dist/css/landing-page.min.css" rel="stylesheet">

        <!--<link href="dist/css/agency.min.css" rel="stylesheet">-->

    </head>

    <body style="background-color: #eee">
        <div class="container">
            <?php echo _mensagem_flashdata(); ?>
            <div class="row">
                <div class="col-md-8 offset-md-2" style="margin-top: 25px;">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Cadastre-se
                                <div style="float: right;">
                                    <a href="<?= base_url('inicio') ?>"><span class="fa fa-reply"></span>Voltar</a>
                                </div>
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('usuario/cadastro') ?>" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <label>Nome Completo:* </label>
                                        <input type="text" class="form-control" name="nome" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label>Email:* </label>
                                        <input type="email" class="form-control" name="email" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <i data-toggle="tooltip" title="Digite uma senha para acessar o sistema!" class="fa fa-info-circle" aria-hidden="true"></i>
                                        <!--<span data-toggle="tooltip" title="Hooray!">Hover over me</span>-->
                                        <label>Senha:* <i class="columnHeader-descriptionIcon icons-info"></i></label>
                                        <input type="password" class="form-control" name="senha" required>
                                    </div>
                                    <div class="form-group">
                                        <i data-toggle="tooltip" title="Digite a mesma senha colocada acima!" class="fa fa-info-circle" aria-hidden="true"></i>
                                        <!--<span data-toggle="tooltip" title="Hooray!">Hover over me</span>-->
                                        <label>Confirmação de Senha:* <i class="columnHeader-descriptionIcon icons-info"></i></label>
                                        <input type="password" class="form-control" name="senha1" required>
                                    </div>

                                    *Campos obrigatórios<br><br>
                                    <input type="submit" name="cadastrar" value="Salvar"  class='btn btn-lg btn-default btn-block' />
                                </fieldset>
                            </form>  
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript -->
        <script src="dist/vendor/jquery/jquery.min.js"></script>
        <script src="dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </body>

</html>
