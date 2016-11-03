<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta content="Simplon Epinal numérique dev web développeur developper internet école formation"
          name="description"/>
    <meta content="" name="Simplon"/>

    <title>Simplon Epinal</title>
<!-- couleur rose: #ed1450 -->
    <!--CSS styles-->
    <?= $this->Html->css('../assets/global/plugins/bootstrap/css/bootstrap.min.css') ?>
    <?= $this->Html->css('front.css') ?>

    <!--favicon-->
    <link rel="shortcut icon" href="favicon.ico"/>

</head>
<header>
    <div class="page-logo">
        <a href="/">
            <?= $this->Html->image('../img/Simplon.png', ['class' => 'logo-default', 'width' => 150, 'height' => 50]) ?>
        </a>
        <a class="btn btn-default pull-right" href="./utilisateur/connexion">Connexion</a>
    </div>
    <nav id="menu">
        <div class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand <?php if ($this->request->here == '/'):?>active <?php endif; ?>" href="/">Accueil</a>

                </div>
                <div class="collapse navbar-collapse ribbon" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li <?php if ($this->request->here == '/blog-articles'): ?> class="active" <?php endif;?>><?= $this->Html->link('News', ['controller' => 'BlogArticles', 'action' => 'index']);?></li>
                        <li <?php if ($this->request->here == '/promotions'): ?> class="active" <?php endif;?>><?= $this->Html->link('Promotion',['controller' => 'Promotions', 'action' => 'index']);?></li>
                        <li <?php if ($this->request->here == '/portfolios'): ?> class="active" <?php endif;?>><?= $this->Html->link('Projets',['controller' => 'Portfolios', 'action' => 'index']);?></li>
                        <li <?php if ($this->request->here == '/pages/infos'):?> class="active" <?php endif; ?>><a href="pages/infos">Informations</a></li>
                        <li><a href="/nous-contacter">Nous contacter</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>

<body>

<!--content-->
<div class="content">
    <div class="container">
        <div class="row">
            <?= $this->fetch('content') ?>
        </div>
    </div>


</div>

</body>

<footer>
    <div class="container">
        <div class="row">
            <H1>CECI EST UN PODOTEUR</H1>
        </div>
        <div class="row">
            <div class="col-md-3">
                des trucs
            </div>
            <div class="col-md-3">
                qui puent
            </div>
            <div class="col-md-3">
                des pieds
            </div>
        </div>
    </div>

</footer>
<script>
    var CheminComplet = document.location.href;
    var CheminRepertoire  = CheminComplet.substring( 0 ,CheminComplet.lastIndexOf( "/" ) );
    var NomDuFichier     = CheminComplet.substring(CheminComplet.lastIndexOf( "/" )+1 );
</script>
<!--JS libraries-->
<?= $this->html->script('../assets/global/plugins/jquery.min.js') ?>
<?= $this->html->script('../assets/global/plugins/bootstrap/js/bootstrap.min.js') ?>


</html>