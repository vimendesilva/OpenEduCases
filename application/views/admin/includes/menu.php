

<div class="wrapper">
    <div class="sidebar" data-background-color="light-gray" data-active-color="danger">

        <!--
                    Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
                    Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
        -->

        <div class="sidebar-wrapper" style="background-color:grey;">
            <div class="logo" style="border-bottom: 1px solid white;">
                <a href="<?= base_url('admin/admin/dash/0') ?>" class="simple-text" style="color: white; text-transform: none; font-size: 22px">
                    OpenEduCases
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="<?= base_url('admin/admin/dash/0') ?>">
                        <i class="ti-panel"></i>
                        <p>Painel de Controle</p>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/admin/perfil/' . $this->session->userdata('id')) ?>">
                        <i class="ti-user"></i>
                        <p>Meu Perfil</p>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/admin/repositorio/0') ?>">
                        <i class="ti-view-list-alt"></i>
                        <p>Repositório de Casos</p>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/casos/casos_usuario/' . $this->session->userdata('id') . '/0') ?>">
                        <i class="ti-list"></i>
                        <p>Meus Casos</p>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/casos/usos/' . $this->session->userdata('id') . '/0') ?>">
                        <i class="ti-layers-alt"></i>
                        <p>Em uso</p>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('usuario/logout') ?>" onclick="return confirm('Deseja realmente sair?')">
                        <i class="ti-close"></i>
                        <p>Sair</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>

    