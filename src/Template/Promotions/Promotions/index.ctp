<style>
    i:hover {
        opacity: 0.5;
    }
</style>

<div class="promotions index large-9 medium-8 columns content">
    <div class="row">
        <h1 class="text-center"><?= __('Promotions') ?></h1>
        <?php foreach ($promotions as $promotion): ?>
            <div class="col-md-3 text-center well"
                 style="background-color: white;border: 1px solid #444d58; min-height: 500px">
                <img class="img-circle img-responsive" src=" ../../uploads/user/<?= $promotion->user->picture_url ?>">
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
                <span style="background-color: #444d58"
                      class="label label-default"><?= ($promotion->language_html) ? 'html' : '' ?></span>
                <span style="background-color: #444d58"
                      class="label label-default"><?= ($promotion->language_css) ? 'css' : '' ?></span>
                <span style="background-color: #444d58"
                      class="label label-default"><?= ($promotion->language_javascript) ? 'javascript' : '' ?></span>
                <span style="background-color: #444d58"
                      class="label label-default"><?= ($promotion->language_jquery) ? 'jquery' : '' ?></span>
                <span style="background-color: #444d58"
                      class="label label-default"><?= ($promotion->language_php) ? 'php' : '' ?></span>
                <span style="background-color: #444d58"
                      class="label label-default"><?= ($promotion->language_sql) ? 'sql' : '' ?></span>
                <span style="background-color: #444d58"
                      class="label label-default"><?= ($promotion->language_cakephp) ? 'cakephp' : '' ?></span>
                <span style="background-color: #444d58"
                      class="label label-default"><?= ($promotion->language_bootstrap) ? 'bootstrap' : '' ?></span>
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