<?= $this->Html->link('Accueil',['controller' => 'Pages','action' => '/','prefix' => false]) ?> /
<?= $this->Html->link($this->request->params['controller'],['action' => 'index','prefix' => false]) ?> /
<?= $portfolio->name ?>
<div class="row">
    <h1 class="h1 bold text-center"><?= $portfolio->name ?></h1>
    <hr style="border-color:transparent;">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <?= $this->Html->image('../uploads/portfolios/'.$portfolio->picture_url,[
            'class' => 'img-responsive',
            'style' => 'margin:0 auto'
        ]) ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="background-color: rgba(255,255,255,0.6)">
        <h4 class="bold">Projet réalisé par :</h4>
        <?php
        $users = [];
        foreach ($portfolio->users as $user)
        {
            $users[$user->id] = $this->Html->link($user->firstname . ' ' . $user->lastname,
                ['controller' => 'Users', 'action' => 'view',$user->id,'prefix' => false]);
        }
        echo implode(', ',$users);
        ?>
        <h4 class="bold voffset3"><?= __('Description') ?></h4>
        <?= nl2br(h($portfolio->description)) ?>
    </div>

</div>
<hr>
<div class="text-center">
    <?php
    (substr($portfolio->url,0,7) != 'http://') ? $url = 'http://' . $portfolio->url : $url = $portfolio->url;
    ?>
    <?= $this->Html->link('<span class="glyphicon glyphicon-eye-open"></span> Voir le projet',$url,[
        'class' => 'btn btn-lg btn-info',
        'escape' => false
    ]) ?>
</div>
