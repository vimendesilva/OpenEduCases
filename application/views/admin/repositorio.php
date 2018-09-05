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
                <a class="navbar-brand" href="<?= base_url('admin/admin/repositorio') ?>">Repositório de Casos</a>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="title">Repositório de Casos</h4>
                                    <p class="category">Listagem dos casos criados por todos os usuários</p>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-5 ">
                                    <form action="<?= base_url('admin/casos/buscar_caso/') ?>" method="post" enctype="multipart/form-data" class="form-inline my-2 my-lg-0">
                                        <input name="busca" class="form-control mr-sm-2 border-input" type="search" placeholder="Busca" aria-label="Search" value="<?= $busca ?>" required="required">
                                        <i data-toggle="tooltip" title="Busca casos por palavras do título e palavras-chave" class="fa fa-info-circle" aria-hidden="true"></i>
                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Busca</button>
                                    </form>
                                </div>
                                <!--</div>-->
                                <!--<div class="row">-->
                                <div class="col-md-6 col-md-offset-1">
                                    <form action="<?= base_url('admin/casos/buscar_caso_area/') ?>" method="post" enctype="multipart/form-data" class="form-inline my-2 my-lg-0">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Área</label>
                                            <i data-toggle="tooltip" title="Busca casos pela área escolhida" class="fa fa-info-circle" aria-hidden="true"></i>
                                            <select name="area" class="form-control border-input" id="area" required="required">
                                                <option value="">Selecione uma opção</option>
                                                <?php foreach ($areas as $r): ?>
                                                    <option value="<?= $r->id_area ?>"><?= $r->nome_area ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Busca</button>
                                    </form>           
                                </div>
                            </div>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
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
                                            <!--<td><a data-toggle="modal" href="#<?= $r->id_caso ?>"><?= $r->nome_caso ?></a></td>-->
                                            <td><a style="cursor: pointer" href="<?= base_url('admin/casos/ver_caso/' . $r->id_caso . '/0') ?>"><?= $r->nome_caso ?></a></td>
    <!--                                            <td> $d->format('d/m/Y'); ?></td>-->
                                            <td><?= $r->nome_area ?></td>
                                            <td>
                                                <a class="btn btn-info btn-fill btn-wd" href="<?= base_url('admin/casos/ver_caso/' . $r->id_caso . '/0') ?>" title="Ver Caso">Ver Caso</a>
                                            </td>
                                            <td>
                                                <!--<button id="btnItems" type="button" class="btn btn-info btn-fill btn-wd">Salvar</button>-->
                                                <a class="btn btn-success btn-fill btn-wd" href="<?= base_url('admin/casos/usar/' . $this->session->userdata('id') . '/' . $r->id_caso) ?>" title="Usar">Usar Caso</a>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li>
                                        <a href="<?= base_url('admin/admin/repositorio/0') ?>" aria-label="Previous">
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
                                        <li <?php echo $estilo; ?>><a href="<?= base_url('admin/admin/repositorio/' . $ind) ?>"><?php echo $i + 1; ?></a></li>
                                        <?php
                                    }
                                    $u = $n_pag - 1;
                                    ?>
                                    <li>
                                        <a href="<?= base_url('admin/admin/repositorio/' . $u) ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
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