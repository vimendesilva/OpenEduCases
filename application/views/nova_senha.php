<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Repositório de Casos</title>

        <!-- Bootstrap core CSS -->
        <link href="<?= base_url(); ?>dist/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="<?= base_url(); ?>dist/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url(); ?>dist/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="<?= base_url(); ?>dist/css/landing-page.min.css" rel="stylesheet">

        <!--<link href="dist/css/agency.min.css" rel="stylesheet">-->

    </head>

    <body style="background-color: #eee">
        <div class="container">
            <?php echo _mensagem_flashdata(); ?>
            <div class="row">
                <div class="col-md-8 offset-md-2" style="margin-top: 25px;">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Nova Senha
<!--                                <div style="float: right;">
                                    <a href="<?= base_url('inicio') ?>"><span class="fa fa-reply"></span>Voltar</a>
                                </div>-->
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('usuario/recuperar') ?>" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <label>Nova Senha:* </label>
                                        <input type="password" class="form-control" name="senha" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirmar Senha:* </label>
                                        <input type="password" class="form-control" name="conf_senha" required autofocus>
                                    </div>
                                    <input type="hidden" name="email" value="<?php echo $email; ?>"/>
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
        <script src="<?= base_url(); ?>dist/vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url(); ?>dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </body>

</html>
