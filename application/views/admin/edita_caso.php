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
                <a class="navbar-brand" href="#">Editar Caso</a>
            </div>
        </div>
    </nav>
    <?php
//    $chave = explode(",", $dados[0]->palavra_chave_caso);
//    echo $chave[0];
//echo $chave[0];
    ?>
    <div class="content">
        <div class="container-fluid">
            <?php echo _mensagem_flashdata(); ?>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Editar Caso</h4>
                        </div>
                        <div class="content">
                            <form id="edita_caso" action="<?= base_url('admin/casos/salva_edicao/' . $dados[0]->id_caso) ?>" method="post" enctype="multipart/form-data">
                                <!--<form>-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input id="nome" name="nome" type="text" class="char-count form-control border-input" placeholder="Nome" value="<?= $dados[0]->nome_caso ?>" maxlength="50">
                                            <label><small><span name="nome">50</span></small> caracteres restantes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Origem/Fonte</label>
                                            <input name="origem" type="text" class="form-control border-input" placeholder="Empresa/Artigo" value="<?= $dados[0]->origem_caso ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Estória</label>
                                            <textarea name="estoria" rows="5" class="form-control border-input" ><?= $dados[0]->estoria_caso ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="exampleInputEmail1">Palavras-chave</label>
                                        <!--<i data-toggle="tooltip" title="Tecle enter após digitar cada palavra-chave." class="fa fa-info-circle" aria-hidden="true"></i>-->
                                        <div class="pillbox form-group" data-initialize="pillbox" id="myPillbox">
                                            <ul class="clearfix pill-group">
                                                <li class="pillbox-input-wrap btn-group">
                                                    <a class="pillbox-more">and <span class="pillbox-more-count"></span> more...</a>
                                                    <input type="text" class="form-control dropdown-toggle pillbox-add-item" placeholder="inserir palavra-chave">
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
                                            <label for="exampleFormControlSelect1">Área</label>
                                            <select name="area" class="form-control border-input" id="area">
                                                <option value="<?= $areasubarea[0]->id_area ?>"><?= $areasubarea[0]->nome_area ?></option>
                                                <?php foreach ($areas as $r): ?>
                                                    <option value="<?= $r->id_area ?>"><?= $r->nome_area ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Subárea</label>
                                            <select name="subarea" class="form-control border-input" id="subarea">
                                                <option value="<?= $areasubarea[0]->id_sub ?>"><?= $areasubarea[0]->nome_sub ?></option>
                                            </select>
                                        </div>

                                    </div>

                                </div>


                                <div class="text-center">
                                    <!--<input type="button" class="btn btn-mini" id="btnItems" value="log to console">-->
                                    <!-- <button id="btnItems" type="submit" class="btn btn-info btn-fill btn-wd">Salvar</button> -->
                                    <button id="btnEditar" type="button" class="btn btn-info btn-fill btn-wd">Salvar</button>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


