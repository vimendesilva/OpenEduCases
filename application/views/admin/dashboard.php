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
                <a class="navbar-brand" href="<?= base_url('admin/admin') ?>">Painel de Controle</a>
            </div>
        </div>
    </nav>
    <?php
    $itens = 5;
    $n_pag = ceil($qtd / $itens);
    ?>
    <div class="content">
        <div class="container-fluid">
            <?php echo _mensagem_flashdata(); ?>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2 col-sm-6">
                    <a>
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-search"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <a href="<?= base_url('admin/admin/repositorio/0') ?>" style="color: #777" title="Buscar Caso">Buscar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-success text-center">
                                        <i class="ti-pencil-alt"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <a href="<?= base_url('admin/casos/index/dash') ?>" style="color: #777" title="Novo Caso">Novo</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="col-lg-4"></div>-->
<!--                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-danger text-center">
                                        <i class="ti-comment-alt"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <a href="<?= base_url('admin/casos/usos/' . $this->session->userdata('id') . '/0') ?>" style="color: #777" title="Comentar Caso">Comentar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <i class="ti-timer"></i> In the last hour
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->

            </div>
            <div class="row" style="margin-top: 50px;">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Repositório de Casos</h4>
                            <p class="category">Casos públicos disponíveis para uso e recentemente cadastrados pelos usuários</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table id="example" class="table table-striped">
                                <thead>
                                    <tr><th>Nome</th>
                                        <!--<th>Data</th>-->
                                        <th>Área</th>
                                    </tr></thead>
                                <tbody>
                                    <?php
                                    foreach ($todos as $r):
                                        $d = new DateTime($r->data_caso);
                                        ?>
                                        <tr>
                                            <td><a style="cursor: pointer" href="<?= base_url('admin/casos/ver_caso/' . $r->id_caso . '/0') ?>"><?= $r->nome_caso ?></a></td>
<!--                                            <td> $d->format('d/m/Y'); ?></td>-->
                                            <td><?= $r->nome_area ?></td>

                                            <td>
                                                <!--<a class="btn btn-sm btn-success btn-icon" href="<?= base_url('admin/casos/usar/' . $this->session->userdata('id') . '/' . $r->id_caso) ?>" title="Usar"><i class="ti-comment-alt"></i></a>-->
                                                <a class="btn btn-success btn-fill btn-wd" href="<?= base_url('admin/casos/usar/' . $this->session->userdata('id') . '/' . $r->id_caso) ?>" title="Usar">Usar Caso</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-info btn-fill btn-wd" href="<?= base_url('admin/casos/ver_caso/' . $r->id_caso . '/0') ?>" title="Ver Caso">Ver Caso</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li>
                                        <a href="<?= base_url('admin/admin/dash/0') ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php
                                    for ($i = 0; $i < $n_pag; $i++) {
                                        $ind = $i + 1;
                                        $estilo = "";
                                        if ($atual == $i) {
                                            $estilo = "class=\"active\"";
                                        }
                                        ?>
                                        <li <?php echo $estilo; ?>><a href="<?= base_url('admin/admin/dash/' . $ind) ?>"><?php echo $i + 1; ?></a></li>
                                    <?php
                                    }
                                    $u = $n_pag - 1;
                                    ?>
                                    <li>
                                        <a href="<?= base_url('admin/admin/dash/' . $u) ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php foreach ($todos as $r): ?>
        <!-- Modal -->
        <div class="modal fade" id="<?= $r->id_caso ?>" role="dialog" >
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Detalhes do Caso</h4>
                    </div>
                    <div class="modal-body">
                        <p><b>Nome:</b></p>
                        <p><?= $r->nome_caso ?></p>
                        <p><b>Criado por:</b></p>
                        <p><?= $r->nome_usu ?></p>
                        <p><b>Estória:</b></p>
                        <p><?= $r->estoria_caso ?></p>
                        <p><b>Palavra-chave:</b></p>
                        <p><?= $r->palavra_chave_caso ?></p>
                        <p><b>Estratégias de uso:</b></p>
                        <ul id="estrategias<?= $r->id_caso ?>"></ul>
                        <!--<a href="<?= base_url('admin/casos/estrategia/' . $r->id_caso) ?>" style="float: right">Nova Estratégia</a>-->
                    </div>
                    <div class="modal-footer" style="margin-top: 20px">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>

            </div>
        </div>
<?php endforeach; ?>

</div>
</div>


