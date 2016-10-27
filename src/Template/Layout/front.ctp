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

    <!--CSS styles-->
    <?= $this->Html->css('../assets/global/plugins/bootstrap/css/bootstrap.min.css') ?>

    <!--favicon-->
    <link rel="shortcut icon" href="favicon.ico"/>

</head>
<header>
    <div class="page-logo">
        <a href="/">
            <?= $this->Html->image('../img/Simplon.png', ['class' => 'logo-default', 'width' => 150, 'height' => 50]) ?>
        </a>
        <a class="btn btn-default right" href="./utilisateur/connexion">Connection</a>
    </div>

    <nav>
        <div class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Accueil</a>

                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><?= $this->Html->link('News', ['controller' => 'BlogArticles', 'action' => 'index']);?></li>
                        <li><a>les gens</a></li>
                        <li><a>les projets des gens</a></li>
                        <li><a>les promotions</a></li>
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

<!--JS libraries-->
<?= $this->html->script('../assets/global/plugins/jquery.min.js') ?>
<?= $this->html->script('../assets/global/plugins/bootstrap/js/bootstrap.min.js') ?>


</html>