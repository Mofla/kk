<?php $this->layout = 'front'; ?>

<style>
    i:hover {
        opacity: 0.5;
    }
</style>

<div class="promotions index large-9 medium-8 columns content">
    <div class="row">
        <h1 class="text-center" style="font-weight: 900; color: blue"><?= __('Promotion') ?></h1>
        <?php foreach ($promotions as $promotion): ?>
            <div class="col-md-3 text-center well" style="background-color: white;border: 1px solid lightblue; min-height: 520px">
                <img class="img-circle img-responsive" style="width: 70%; margin: auto;border: 1px solid #ed1450" src=" ../../uploads/user/<?= $promotion->user->picture_url ?>">
                <br>
                <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'view', $promotion->user->id, 'prefix' => 'utilisateur']) ?>">
                    <h3 style="font-weight: 900"><?= ($promotion->user->firstname) ?> <?= ($promotion->user->lastname) ?></h3>
                </a><br>
                <div>
                    <?php if ($promotion->facebook_link != '') { ?>
                        <a href="<?= ($promotion->facebook_link) ?>">
                            <i style="font-size: 50px" class="fa fa-facebook-official"></i></a>
                    <?php } ?>
                    <?php if ($promotion->twitter_link != '') { ?>
                        <a href="<?= ($promotion->twitter_link) ?>">
                            <i style="font-size: 50px; margin-left: 4%;color: lightseagreen"
                               class="fa fa-twitter-square"></i></a>
                    <?php } ?>
                    <?php if ($promotion->linkedin_link != '') { ?>
                        <a href="<?= ($promotion->linkedin_link) ?>">
                            <i style="font-size: 50px; margin-left: 4%; color: blue" class="fa fa-linkedin-square"></i></a>
                    <?php } ?>
                    <?php if ($promotion->user->github_username != '') { ?>
                        <a href="<?= ($promotion->user->github_username) ?>">
                            <i style="font-size: 50px; margin-left: 4%;color: black"
                               class="fa fa-github-square"></i></a>
                    <?php } ?>
                </div>
                <p style="font-weight: 500; font-size: 15px"><i
                        class="glyphicon glyphicon-envelope"></i> <?= ($promotion->user->email) ?>
                    <br></p>
                <?php if ($promotion->language_html) { ?>
                <div style="background-color: #ed1450; color: white;border: 1px solid white" class="btn">html</div>
                <?php } ?>
                <?php if ($promotion->language_css) { ?>
                <div style="background-color: #ed1450; color: white;border: 1px solid white" class="btn">css</div>
                <?php } ?>
                <?php if ($promotion->language_javascript) { ?>
                <div style="background-color: #ed1450; color: white;border: 1px solid white" class="btn">javascript</div>
                <?php } ?>
                <?php if ($promotion->language_jquery) { ?>
                <div style="background-color: #ed1450; color: white;border: 1px solid white" class="btn">jquery</div>
                <?php } ?>
                <?php if ($promotion->language_php) { ?>
                <div style="background-color: #ed1450; color: white;border: 1px solid white" class="btn">php</div>
                <?php } ?>
                <?php if ($promotion->language_sql) { ?>
                <div style="background-color: #ed1450; color: white;border: 1px solid white" class="btn">sql</div>
                <?php } ?>
                <?php if ($promotion->language_cakephp) { ?>
                <div style="background-color: #ed1450; color: white;border: 1px solid white" class="btn">cakephp</div>
                <?php } ?>
                <?php if ($promotion->language_bootstrap) { ?>
                <div style="background-color: #ed1450; color: white;border: 1px solid white" class="btn">bootstrap</div>
                <?php } ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>