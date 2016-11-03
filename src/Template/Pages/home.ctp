<?php $this->layout = 'front'; ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading text-center"><h3>PROMOTION</h3></div>
                <div class="panel-body">
                    <a href="<?= $this->Url->Build(['controller' => 'Promotions', 'action' => 'index']); ?>">
                        <img class="img-responsive" src="../uploads/imgs/simplon.JPG">
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading text-center"><h3>INFORMATIONS</h3></div>
                <div class="panel-body">
                    <img class="img-responsive"
                         src="http://www.centpourcent-vosges.fr/art-4013-83-700/a-epinal-le-coworking-decloisonne-les-projets-et-les-idees.jpg">
                    <br>
                    <p>Simplon Épinal est un projet de «fabrique numérique» initié par la <a
                            href="http://www.agglo-epinal.fr/">Communauté d’agglomération Épinal </a>et <a
                            href="http://www.epinal.fr/">la ville d’Épinal</a>, et porté par <a
                            href="http://www.lorraine.cci.fr/">CCI Lorraine</a> et Simplon.co. La fabrique ouvrira ses
                        portes en avril 2016 à Epinal dans les locaux du Centre d’affaires de la CCI des Vosges, situés
                        à
                        proximité immédiate de la gare.</p>
                    <a href="/pages/infos" class="btn btn-info" style="float: right">Voir Plus</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading text-center"><h3>NEWS</h3></div>
                <div class="panel-body">
                    <?php foreach ($articles as $article) { ?>
                        <div class="well">
                            <a href="<?= $this->Url->Build(['controller' => 'BlogArticles', 'action' => 'view', $article->id]) ?>">
                                <h3 class="text-center" style="color: blue"><?= $article->title ?></h3></a>
                            <p><?= $article->body ?></p>
                        </div>
                    <?php } ?>
                    <div>
                        <a style="float: right" href="<?= $this->Url->Build(['controller' => 'BlogArticles', 'action' => 'index']) ?>"
                           class="btn btn-primary">Voir toutes les News</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading text-center"><h3>PROJETS</h3></div>
                <div class="panel-body">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                        </ol>

                        <!-- Wrapper for slides -->

                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img style="width: 100%;height: 350px" class="img-responsive" src="../../uploads/imgs/simplon.JPG">
                            </div>
                            <?php foreach ($portfolios as $portfolio) { ?>
                                <div class="item">
                                    <img style="width: 100%;height: 350px" class="img-responsive" src="../../uploads/portfolios/<?= $portfolio->picture_url ?>">
                                </div>
                            <?php } ?>
                        </div>
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <br>
                    <div>
                        <a style="float: right" href="<?= $this->Url->Build(['controller' => 'Portfolios', 'action' => 'index']) ?>"
                           class="btn btn-primary">Voir tous les Projets</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
