<?= $this->Html->css('portfolio.css') ?>
<div class="row">
    <?php foreach($portfolios as $portfolio): ?>
        <div class="col-sm-12 col-md-4">
            <div class="panel panel-default panel-bordered">
                <div class="panel-heading" style="background:#444 !important;color:#EEE;">
                    <h6 class="h4 text-center"><?= $portfolio->name ?></h6>
                </div>
                <div class="panel-body bg-portfolio">
                    <div class="text-center">
                        <?= $this->Html->image('portfolios/'.$portfolio->picture_url,['class' => 'img-thumbnail img-responsive']) ?>
                    </div>

                </div>
                <div class="panel-footer" style="background:#444 !important;">
                    <div class="text-right">
                        <?= $this->Html->link('<span class="glyphicon glyphicon-eye-open"></span> Voir',[
                            'action' => 'view', $portfolio->id],
                            ['class' => 'btn btn-portfolio btn-xs img-rounded','escape' => false]
                        ) ?>
                    </div>
                </div>

            </div>
        </div>
    <?php endforeach; ?>
</div>