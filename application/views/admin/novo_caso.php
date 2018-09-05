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
                <a class="navbar-brand" href="#">Novo Caso</a>
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
                            <h4 class="title">Criar Novo Caso
                                <div style="float: right;">
                                    <?php if ($pag == 'dash') { ?>
                                        <a href="<?= base_url('admin/admin/dash/0') ?>"><span class="fa fa-reply"></span>Voltar</a>
                                    <?php } else {
                                        ?>
                                        <a href="<?= base_url('admin/casos/casos_usuario/' . $this->session->userdata('id') . '/0') ?>"><span class="fa fa-reply"></span>Voltar</a>
                                    <?php }
                                    ?>
                                </div>
                            </h4>
                        </div>
                        <div class="content">
                            <div id="mensagem"></div>
                            <form id="novo_caso" action="<?= base_url('admin/casos/novo_caso/' . $this->session->userdata('id')) ?>" method="post" enctype="multipart/form-data">
                                <!--<form>-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nome do Caso<span style="color: red">*</span></label>
                                            <!--<i data-toggle="tooltip" title="Verifique se o campo possui até 50 caracteres!" class="fa fa-info-circle" aria-hidden="true"></i>-->
                                            <input id="nome" name="nome" type="text" class="char-count form-control border-input" placeholder="Nome" required="required" maxlength="50">
                                            <label><small><span name="nome">50</span></small> caracteres restantes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Origem/Fonte</label>
                                            <i data-toggle="tooltip" title="Informe um endereço web ou o nome da fonte do caso!" class="fa fa-info-circle" aria-hidden="true"></i>
                                            <input name="origem" type="text" class="form-control border-input" placeholder="Empresa/Artigo" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Estória<span style="color: red">*</span></label>
                                            <i data-toggle="tooltip" title="Descrição do Caso." class="fa fa-info-circle" aria-hidden="true"></i>
                                            <textarea id="estoria" name="estoria" rows="5" class="form-control border-input" required="required"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="exampleInputEmail1">Palavras-chave<span style="color: red">*</span></label>
                                        <i data-toggle="tooltip" title="Tecle enter após digitar cada palavra-chave." class="fa fa-info-circle" aria-hidden="true"></i>
                                        <div class="pillbox form-group" data-initialize="pillbox" id="myPillbox">
                                            <ul class="clearfix pill-group">
                                                <li class="pillbox-input-wrap btn-group">
                                                    <a class="pillbox-more">and <span class="pillbox-more-count"></span> more...</a>
                                                    <input type="text" class="form-control dropdown-toggle pillbox-add-item" placeholder="inserir palavra-chave" required="required">
                                                    <input id="chave" name="chave" type="text" hidden="true">
                                                    <button type="button" class="dropdown-toggle sr-only">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Área<span style="color: red">*</span></label>
                                            <select name="area" class="form-control border-input" id="area" required="required">
                                                <option value="#">Selecione uma opção</option>
                                                <?php foreach ($areas as $r): ?>
                                                    <option value="<?= $r->id_area ?>"><?= $r->nome_area ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Subárea</label>
                                            <select name="subarea" class="form-control border-input" id="subarea" disabled>
                                                <option value="NULL">Selecione uma opção</option>
                                            </select>
                                        </div>

                                    </div>

                                </div>
                                <div class="modal fade" id="cria_estrategia" role="dialog" style="margin-top: 40px">>
                                    <div class="modal-dialog" >

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Estratégia de Uso</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Deseja cadastrar uma estratégia de uso para este caso?</p>
                                                <a class="btn btn-success btn-fill btn-wd" onclick="save('sim')" title="Criar">Criar</a>
                                                <a class="btn btn-danger btn-fill btn-wd" onclick="save('nao')" title="Sair">Sair</a>
                                            </div>
                                            <div class="modal-footer" style="margin-top: 20px">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="text-center">
                                    <!--<input type="button" class="btn btn-mini" id="btnItems" value="log to console">-->
                                    <!-- <button id="btnItems" type="submit" class="btn btn-info btn-fill btn-wd">Salvar</button> -->
                                    <button id="btnItems" type="button" class="btn btn-info btn-fill btn-wd">Salvar</button>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
