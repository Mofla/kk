<style>
    i:hover{
        opacity: 0.5;
    }
</style>

<div class="promotions index large-9 medium-8 columns content">
    <h1 class="text-center"><?= __('Promotions') ?></h1>

    <?php foreach ($promotions as $promotion): ?>
        <div class="col-md-3 text-center well" style="background-color: white;border: 1px solid #444d58">
            <img  style="width:180px;height: 180px; border-radius: 25%" src=" ../../uploads/user/<?=$promotion->user->picture_url ?>" >
            <br>
            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'view', $promotion->user->id, 'prefix' => 'utilisateur' ]) ?>">
                <h3 style="font-weight: 900"><?= ($promotion->user->firstname) ?> <?= ($promotion->user->lastname) ?></h3></a><br>
            <div>
                <?php if ($promotion->facebook_link != '') { ?>
                    <a href="<?= ($promotion->facebook_link) ?>">
                        <i style="font-size: 50px" class="fa fa-facebook-official"></i></a>
                <?php } ?>
                <?php if ($promotion->twitter_link != '') { ?>
                    <a href="<?= ($promotion->twitter_link) ?>">
                        <i style="font-size: 50px; margin-left: 4%;color: lightseagreen" class="fa fa-twitter-square"></i></a>
                <?php } ?>
                <?php if ($promotion->linkedin_link != '') { ?>
                    <a href="<?= ($promotion->linkedin_link) ?>">
                        <i style="font-size: 50px; margin-left: 4%; color: blue" class="fa fa-linkedin-square"></i></a>
                <?php } ?>
                <?php if ($promotion->user->github_username != '') { ?>
                    <a href="<?= ($promotion->user->github_username) ?>">
                        <i style="font-size: 50px; margin-left: 4%;color: black" class="fa fa-github-square"></i></a>
                <?php } ?>
            </div>
            <p style="font-weight: 500; font-size: 15px"><i class="glyphicon glyphicon-envelope"></i> <?= ($promotion->user->email) ?>
                <br></p>
            <span style="background-color: #444d58" class="label"><?= ($promotion->language_html) ? 'HTML' : '' ?></span>
            <span style="background-color: #444d58" class="label"><?= ($promotion->language_css) ? 'CSS' : '' ?></span>
            <span style="background-color: #444d58" class="label"><?= ($promotion->language_javascript) ? 'JAVASCRIPT' : '' ?></span><br><br>
            <span style="background-color: #444d58" class="label"><?= ($promotion->language_jquery) ? 'JQUERY' : '' ?></span>
            <span style="background-color: #444d58" class="label"><?= ($promotion->language_php) ? 'PHP' : '' ?></span>
            <span style="background-color: #444d58" class="label"><?= ($promotion->language_sql) ? 'SQL' : '' ?></span><br><br>
            <span style="background-color: #444d58" class="label"><?= ($promotion->language_cakephp) ? 'CAKEPHP' : '' ?></span>
            <span style="background-color: #444d58" class="label"><?= ($promotion->language_bootstrap) ? 'BOOTSTRAP' : '' ?></span>
        </div>
    <?php endforeach; ?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
