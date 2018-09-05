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
                <a class="navbar-brand" href="#">Estratégia</a>
            </div>

        </div>
    </nav>


    <div class="content">
        <div class="container-fluid">
            <?php echo _mensagem_flashdata(); ?>
            <div class="row">
                <div class="col-md-12">
                    <p><b>Nome: </b><?= $caso[0]->nome_caso ?>
                    <div style="float: right;">
                        <?php
                        if($pag == 'meus'){ ?>
                            <a href="<?= base_url('admin/casos/casos_usuario/' . $this->session->userdata('id') . '/0') ?>"><span class="fa fa-reply"></span>Voltar</a>
                        <?php 
                        } else { ?>
                            <a href="<?= base_url('admin/casos/usos/' . $this->session->userdata('id') . '/0') ?>"><span class="fa fa-reply"></span>Voltar</a>
                        <?php
                        }
                        ?>
                    </div>
                    </p><br>
                    <p><b>Origem/Fonte: </b><?= $caso[0]->origem_caso ?></p><br>
                    <p><b>Estória: </b><?= $caso[0]->estoria_caso ?></p><br>
                    <form action="<?= base_url('admin/casos/nova_estrategia/' . $this->session->userdata('id')) . '/' . $caso[0]->id_caso ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <p><b>Estratégia de Uso:</b></p>
                            <textarea name="estrategia" id="estrategia" class="form-control" rows="3" required="required"></textarea>
                        </div>
                        <input name="pagina" type="hidden" value="<?= $pag ?>">
                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


