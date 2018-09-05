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
                <a class="navbar-brand" href="<?= base_url('admin/admin/usos') ?>">Usos</a>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Meus Usos</h4>
                            <p class="category">Listagem dos casos usados por você</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                    <tr><th>Nome</th>
                                        <th>Data de Criação</th>
                                        <th>Área</th>
                                    </tr></thead>
                                <tbody>
                                    <?php
                                    foreach ($casos as $r):
                                        $d = new DateTime($r->data_caso);
                                        ?>
                                        <tr>
                                            <td><a style="cursor: pointer" href="<?= base_url('admin/casos/ver_caso/' . $r->id_caso . '/0') ?>"><?= $r->nome_caso ?></a></td>
                                            <td><?= $d->format('d/m/Y'); ?></td>
                                            <td><?= $r->nome_area ?></td>
                                            <td>
                                                <a class="btn btn-info btn-fill btn-wd" href="<?= base_url('admin/casos/ver_caso/' . $r->id_caso . '/0') ?>" title="Ver Caso">Ver Caso</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php
                            
                            ?>
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li>
                                        <a href="<?= base_url('admin/casos/usos/' . $this->session->userdata('id') . '/0') ?>" aria-label="Previous">
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
                                        <li <?php echo $estilo; ?>><a href="<?= base_url('admin/casos/usos/' . $this->session->userdata('id') . '/' . $ind) ?>"><?php echo $i + 1; ?></a></li>
                                        <?php
                                    }
                                    $u = $n_pag - 1;
                                    ?>
                                    <li>
                                        <a href="<?= base_url('admin/casos/usos/' . $this->session->userdata('id') . '/' . $u) ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <?php
                            
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php foreach ($casos as $r): ?>
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
                            <a href="<?= base_url('admin/casos/estrategia/' . $r->id_caso . '/' . 'usos') ?>" style="float: right">Cadastre uma nova estratégia de uso do caso</a>
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