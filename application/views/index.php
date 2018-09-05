<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>OpenEduCases: Repositório de Casos</title>

        <!-- Bootstrap core CSS -->
        <link href="dist/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="dist/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="dist/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="dist/css/landing-page.min.css" rel="stylesheet">

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-light bg-light" style="position: sticky; top: 0; z-index: 1071;">
            <div class="container">
                <a class="navbar-brand" href="#">OpenEduCases: Repositório de Casos</a>

                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active" href="#conceitos">Conceitos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sobre">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#quemsomos">Quem somos?</a>
                    </li>
                    <li>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Login</button>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding-top: 20px;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('usuario/logar'); ?>" id="formlogin" method="post" accept-charset="utf-8" class="px-4 py-3">
                            <div class="form-group">
                                <label for="exampleDropdownFormEmail1">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="email@exemplo.com">
                            </div>
                            <div class="form-group">
                                <label for="exampleDropdownFormPassword1">Senha</label>
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                            </div>
                            <center>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </center>
                        </form>
                        <a class="dropdown-item" href="<?= base_url('usuario') ?>">Não possui conta? Inscreva-se! </a>
                        <a class="dropdown-item" href="<?= base_url('usuario/esqueci_senha') ?>">Esqueci minha senha! </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <?php echo _mensagem_flashdata(); ?>
        </div>
        <!-- Masthead -->
        <header class="masthead text-white text-center" style="background-image: url(<?= base_url() ?>dist/img/03.jpg);">
            <div class="overlay" style="background-color: #007bff;"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <h1 class="mb-5">Ferramenta de apoio à Aprendizagem Baseada em Casos</h1>
                    </div>
                </div>
            </div>
        </header>

        <!-- Icons Grid -->
        <section class="features-icons text-center bg-light" id="conceitos">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex">
                                <i class="icon-screen-desktop m-auto text-primary"></i>
                            </div>
                            <h3>Aprendizagem Baseada em Casos</h3>
                            <p class="lead mb-0">Método centrado nos aprendizes, que busca conectá-los a situações da vida real e criar oportunidades para que eles alinhem teoria e prática por meio da análise de casos e tomadas de decisões.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex">
                                <i class="icon-layers m-auto text-primary"></i>
                            </div>
                            <h3>Casos</h3><br>
                            <p class="lead mb-0">Estórias ou cenários baseados em fatos e problemas do mundo real, que são escritos para estimular os aprendizes a discutir, analisar e apresentar uma solução baseada em fundamentos teóricos relacionados.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                            <div class="features-icons-icon d-flex">
                                <i class="icon-check m-auto text-primary"></i>
                            </div>
                            <h3>A Ferramenta</h3><br>
                            <p class="lead mb-0">OpenEduCases é um repositório de casos educacionais que por ser usado por educadores para cadastrar, buscar e reusar casos.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Image Showcases -->
        <section class="showcase" style="background-color:#212120; color: white" id="sobre">
            <div class="container-fluid p-0">
                <div class="row no-gutters">

                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('dist/img/criar.png');"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>Criação de Casos</h2>
                        <p class="lead mb-0">OpenEduCases permite a criação de casos por meio de atributos</p>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-6 text-white showcase-img" style="background-image: url('dist/img/estrategia.png');"></div>
                    <div class="col-lg-6 my-auto showcase-text">
                        <h2>Adicione estratégias de ensino</h2>
                        <p class="lead mb-0">Ao escolher usar o caso de outro usuário, OpenEduCases permite a criação de novas estratégias de ensino</p>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('dist/img/busca.png');"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>Repositório de Casos</h2>
                        <p class="lead mb-0">Busque casos do seu interesse, por meio de palavras-chave e/ou elementos do título</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="testimonials text-center bg-light" id="quemsomos">
            <div class="container">
                <h2 class="mb-5">Quem somos?</h2>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="dist/img/eu.jpg" alt="">
                            <h5>Vitória Mendes da Silva</h5>
                            <p class="font-weight-light mb-0"></p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="dist/img/aracele.jpg" alt="">
                            <h5>Aracele Garcia de Oliveira Fassbinder</h5>
                            <p class="font-weight-light mb-0"></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- Footer -->
        <footer class="footer" style="background-color:#212120; color: white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 h-100 text-center text-lg-left my-auto">
                        <center>Desenvolvido por LabSoft - Laboratório de Tecnologias de Software e Computação aplicada à Educação - IFSULDEMINAS Campus Muzambinho</center>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="dist/vendor/jquery/jquery.min.js"></script>
        <script src="dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>

</html>
