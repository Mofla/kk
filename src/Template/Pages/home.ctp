<?php $this->layout = 'front'; ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading text-center"><h3>PROMOTION</h3></div>
                <div class="panel-body">
                    <a href="home.ctp">
                    <img class="img-responsive" src="http://www.w3schools.com/css/trolltunga.jpg">
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-5 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading text-center"><h3>FAQ</h3></div>
                <div class="panel-body">
                    <p>Quare hoc quidem praeceptum, cuiuscumque est, ad tollendam amicitiam valet;
                        illud potius praecipiendum fuit, ut eam diligentiam adhiberemus in amicitiis
                        comparandis, ut ne quando amare inciperemus eum, quem aliquando odisse possemus.
                        Quin etiam si minus felices in diligendo fuissemus, ferendum id Scipio potius
                        quam inimicitiarum tempus cogitandum putabat.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 10%">
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading text-center"><h3>NEWS</h3></div>
                <div class="panel-body">
                    <?php foreach ($articles as $article) {?>
                        <div style="border: 1px solid #337ab7">
                        <h4 style=" width: 50%"><?= $article->title?></h4>
                        <p style="width: 50%;display: inline-block"><?= $article->body?></p>
                            <a href="<?= $this->Url->Build(['controller' => 'BlogArticles', 'action' => 'view', $article->id ])?>" class="btn btn-primary">Voir l'Article</a>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>

        <div class="col-md-5 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading text-center"><h3>PROJETS</h3></div>
                <div class="panel-body">
                    <?php foreach ($portfolios as $portfolio) {?>
                        <div>
                        <?= $portfolio->name?>
                        <?= $portfolio->description?>
                        <img class="img-responsive" style="width: 100%" src="../../uploads/portfolios/<?= $portfolio->picture_url?>">
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
