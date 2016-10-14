<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
        <div class="text-center">
            <h1 class="h1"><?= $portfolio->name ?></h1>
            <?= $this->Html->image('../uploads/portfolios/'.$portfolio->picture_url,[
                'class' => 'img-responsive',
                'style' => 'margin:0 auto'
            ]) ?>
        </div>
        <p>
            <legend>Projet réalisé par :</legend>
            <?php
                $users = [];
                foreach ($portfolio->users as $user)
                {
                    $users[$user->id] = $this->Html->link($user->firstname . ' ' . $user->lastname,
                        ['controller' => 'Users', 'action' => 'view',$user->id,'prefix' => false]);
                }
                echo implode(', ',$users);
            ?>
        </p>
        <p>
            <legend><?= __('Description') ?></legend>
            <?= $portfolio->description ?>
        </p>
        <div class="text-center">
            <?php
            (substr($portfolio->url,0,7) != 'http://') ? $url = 'http://' . $portfolio->url : $url = $portfolio->url;
            ?>
            <?= $this->Html->link('<span class="glyphicon glyphicon-eye-open"></span> Voir le projet',$url,[
                'class' => 'btn btn-lg btn-info',
                'escape' => false
            ]) ?>
        </div>
    </div>
</div>