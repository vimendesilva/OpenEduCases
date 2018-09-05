<div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="<?= base_url('admin/admin/perfil') ?>">Perfil</a>
                </div>

            </div>
        </nav>


<div class="content">
    <div class="container-fluid">
        <?php echo _mensagem_flashdata(); ?>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Editar Perfil</h4>
                    </div>
                    <div class="content">
                        <form action="<?= base_url('usuario/atualizar/' . $this->session->userdata('id')) ?>" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nome Completo</label>
                                        <input name="nome" type="text" class="form-control border-input" placeholder="Primeiro nome" value="<?= $usu[0]->nome_usu ?>">
                                    </div>
                                </div>
<!--                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Último nome</label>
                                        <input type="text" class="form-control border-input" placeholder="Último nome">
                                    </div>
                                </div>-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="text" class="form-control border-input" placeholder="Email" value="<?= $usu[0]->email_usu ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Senha</label>
                                        <input name="senha" type="password" class="form-control border-input" placeholder="Senha" value="<?= $usu[0]->senha_usu ?>">
                                    </div>
                                </div>
                            </div>


                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Salvar</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>