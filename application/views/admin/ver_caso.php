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
                <a class="navbar-brand" href="#">Detalhes do Caso</a>
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
                            <h4 class="title">Detalhes do Caso</h4>
                        </div>
                        <div class="content">
                            <?php foreach ($caso as $r): ?>
                                <div class="content">
                                    <div class="container-fluid">
                                        <p><b>Nome:</b></p>
                                        <p><?= $r->nome_caso ?></p>
                                        <p><b>Criado por:</b></p>
                                        <p><?= $r->nome_usu ?></p>
                                        <p><b>Estória:</b></p>
                                        <p><?= $r->estoria_caso ?></p>
                                        <p><b>Palavra-chave:</b></p>
                                        <p><?= $r->palavra_chave_caso ?></p>
                                        <p><b>Estratégias de uso:</b></p>
                                        <ul id="estrategias">
                                            <?php
                                            if (!$estrategias) {
                                                echo "Não há cadastro de estratégias de uso do caso!";
                                            } else {
                                                foreach ($estrategias as $s) {
                                                    echo "<li>" . $s->estrategia . "</li>";
                                                }
                                            }
                                            ?>
                                        </ul>
                                        <a class="btn btn-info btn-fill btn-wd" href="<?= base_url('admin/casos/estrategia/' . $r->id_caso . '/' . 'meus') ?>" style="float: right">Cadastre uma nova estratégia de uso do caso</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


