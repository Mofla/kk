<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">-->
    <!--<ul class="side-nav">-->
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <!--<li><?= $this->Html->link(__('New Forum'), ['action' => 'add']) ?></li>-->
        <!--<li><?= $this->Html->link(__('List Threads'), ['controller' => 'Threads', 'action' => 'index']) ?></li>-->
        <!--<li><?= $this->Html->link(__('New Thread'), ['controller' => 'Threads', 'action' => 'add']) ?></li>-->
    <!--</ul>-->
<!--</nav>-->


<div class="col-md-12">
<div class="table-responsive">
    <h3><?= __('Forums') ?></h3>

            <?php foreach ($cat as $forum): ?>
    <table class="table">
        <thead class="category">
        <tr>
            <th colspan="5" scope="col"><?= $forum->name ?></th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($forum->forums as $section): ?>
            <tr  class="sscategory" >
                <td width="6%">
                    <?php if ($section->icon): ?>
                   <?= $this->Html->image("../uploads/icons/$section->icon" , ['class' => 'forum-icon'])?>
                    <?php endif ?>
                    <?php if (!$section->icon): ?>
                    <?= $this->Html->image("../uploads/icons/defaut.png" , ['class' => 'forum-icon'])?>
                    <?php endif ?>
                </td>
                <td width="60%"> <?= $this->Html->link(__($section->name), ['action' => 'view', $section->id]) ?>
                    <br>
                    <?= $section->description ?></td>
                <td width="7%"><span class="stat"><i class="fa fa-comment-o fa"><?= $section->countthread ?></i></span></td>
                <td width="7%"><span class="stat"><i class="fa fa-comments-o fa"><?= $section->countpost ?></i></span></td>
                <td width="20%" style="text-align: right">
                    <?= $this->Html->link(__($section->post->title), ['controller' => 'Threads','action' => 'view', $section->post->thread_id]) ?>
                    <br>
                    <?php if ($section->post->created) { echo "le ".$section->post->created->i18nformat('dd/MM/YY à hh:mm', 'Europe/Paris') ;} ?> <br>
                    <?php if ($section->user->username) { echo "par ".$section->user->username ;} ?></td>
            </tr>
<?php
$id = $section->id ;


        ?>

                <!--<td class="actions">-->
                    <!--<?= $this->Html->link(__('View'), ['action' => 'view', $forum->id]) ?>-->
                    <!--<?= $this->Html->link(__('Edit'), ['action' => 'edit', $forum->id]) ?>-->
                    <!--<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $forum->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forum->id)]) ?>-->
                <!--</td>-->

        <?php endforeach; ?>

        </tbody>
    </table>
    <?php endforeach; ?>
</div>
</div>


<script>
$('tr').click( function() {
    window.location = $(this).find('a').attr('href');
}).hover( function() {
    $(this).toggleClass('hover');
});
</script>