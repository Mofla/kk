<div class="promotions index large-9 medium-8 columns content">
    <h3 class="text-center"><?= __('Promotions') ?></h3>

    <?php foreach ($promotions as $promotion): ?>
        <div class="col-md-3 text-center well" style="background-color: white">
            <?= $this->Html->image('../../uploads/user/' . $promotion->user->picture_url, ['style' => 'width:200px']); ?>
            <br>
            <?= ($promotion->user->firstname) ?> <?= ($promotion->user->lastname) ?>
            <br>
            <?php if ($promotion->facebook_link != '') { ?>
                <a href="<?= ($promotion->facebook_link) ?>" class="btn btn-primary uppercase">Facebook</a>
            <?php } ?>
            <?php if ($promotion->twitter_link != '') { ?>
                <a href="<?= ($promotion->twitter_link) ?>" class="btn btn-primary uppercase">Twitter</a>
            <?php } ?>
            <?php if ($promotion->linkedin_link != '') { ?>
                <a href="<?= ($promotion->linkedin_link) ?>" class="btn btn-primary uppercase">Linkedin</a>
            <?php } ?>
            <?php if ($promotion->user->github_username != '') { ?>
                <a href="<?= ($promotion->user->github_username) ?>" class="btn btn-primary uppercase">Github</a>
            <?php } ?>
            <p style="font-weight: 500"><i class="glyphicon glyphicon-envelope"></i> <?= ($promotion->user->email) ?>
                <br></p>
            <span class="label label-default"><?= ($promotion->language_html) ? 'HTML' : '' ?></span>
            <span class="label label-default"><?= ($promotion->language_css) ? 'CSS' : '' ?></span>
            <span class="label label-default"><?= ($promotion->language_javascript) ? 'JAVASCRIPT' : '' ?></span>
            <span class="label label-default"><?= ($promotion->language_jquery) ? 'JQUERY' : '' ?></span>
            <span class="label label-default"><?= ($promotion->language_php) ? 'PHP' : '' ?></span>
            <span class="label label-default"><?= ($promotion->language_sql) ? 'SQL' : '' ?></span>
            <span class="label label-default"><?= ($promotion->language_cakephp) ? 'CAKEPHP' : '' ?></span>
            <span class="label label-default"><?= ($promotion->language_bootstrap) ? 'BOOTSTRAP' : '' ?></span>
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
