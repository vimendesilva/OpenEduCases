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
                <a class="navbar-brand" href="<?= base_url('admin/casos/casos_usuario/' . $this->session->userdata('id')) ?>">Meus Casos</a>
            </div>
        </div>
    </nav>
    <?php
    $itens = 5;
    $n_pag = ceil($qtd / $itens);
//    echo $ultimo;
    ?>
    <div class="content">
        <div class="container-fluid">
            <?php echo _mensagem_flashdata(); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Meus Casos</h4>
                            <p class="category">Listagem dos casos cadastrados por você</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped" id="dataTable">
                                <thead>
                                    <tr><th>Nome</th>
                                        <!--<th>Data</th>-->
                                        <th>Área</th>
                                    </tr></thead>
                                <tbody>
                                    <?php
                                    foreach ($caso as $r):
                                        $d = new DateTime($r->data_caso);
                                        ?>
                                        <tr>
                                            <td><a style="cursor: pointer" href="<?= base_url('admin/casos/ver_caso/' . $r->id_caso . '/0') ?>"><?= $r->nome_caso ?></a></td>
<!--                                            <td> $d->format('d/m/Y'); ?></td>-->
                                            <td><?= $r->nome_area ?></td>

        <!--<td><a class="btn btn-success btn-icon" href="<?= base_url('admin/casos/editar/' . $r->id_caso) ?>" title="Editar"><i class="ti-pencil"></i></a></td>-->
                                            <td>
                                                <a class="btn btn-info btn-fill btn-wd" href="<?= base_url('admin/casos/ver_caso/' . $r->id_caso . '/0') ?>" title="Ver Caso">Ver Caso</a>
                                            </td>
                                            <td><a class="btn btn-success btn-fill btn-wd" href="<?= base_url('admin/casos/editar/' . $r->id_caso) ?>" title="Editar">Editar</a></td>
                                            <td><a class="btn btn-danger btn-fill btn-wd" href="<?= base_url('admin/casos/apagar/' . $r->id_caso) ?>" title="Apagar" onclick="return confirm('Deseja realmente apagar o caso?')">Apagar</a></td>
                                            <td>
                                                <a class="btn btn-default btn-fill btn-wd" href="<?= base_url('admin/casos/estrategia/' . $r->id_caso . '/' . 'meus') ?>" title="Inserir Estratégia de Uso">Inserir Estratégia de Uso</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li>
                                        <a href="<?= base_url('admin/casos/casos_usuario/' . $this->session->userdata('id') . '/0') ?>" aria-label="Previous">
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
                                        <li <?php echo $estilo; ?>><a href="<?= base_url('admin/casos/casos_usuario/' . $this->session->userdata('id') . '/' . $ind) ?>"><?php echo $i + 1; ?></a></li>
                                        <?php
                                    }
                                    $u = $n_pag - 1;
                                    ?>
                                    <li>
                                        <a href="<?= base_url('admin/casos/casos_usuario/' . $this->session->userdata('id') . '/' . $u) ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

                <!-- Modal -->
                <div class="modal fade" id="inserir_estrategia" role="dialog" >
                    <div class="modal-dialog" >

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Inserir Estratégia de Uso</h4>
                            </div>
                            <div class="modal-body">
                                <p>Você gostaria de inserir uma Estratégia de Uso para o Caso que acabou de criar?</p>
                            </div>
                            <div class="modal-footer" style="margin-top: 20px">
                                <a class="btn btn-success" href="<?= base_url('admin/casos/estrategia/' . $ultimo . '/' . 'meus') ?>">Sim</a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                            </div>
                        </div>

                    </div>
                </div>

            <a href="<?= base_url('admin/casos/index/meus') ?>">
                <button title="Novo Caso" type="button" style="font-size: 24px; float: right; border-width: 1px" class="btn btn-success btn-fill btn-wd">Novo Caso</button>
            </a>
        </div>
    </div>

