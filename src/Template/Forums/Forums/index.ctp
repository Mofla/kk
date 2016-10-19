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
            <th colspan="2" scope="col"><?= $forum->name ?></th>
            <th class="hidden-xs"></th>
            <th class="hidden-xs"></th>
            <th class="hidden-xs"></th>
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
                <td class="hidden-xs" width="7%"><span class="hidden-s stat"><i class="fa fa-comment-o fa"><?= $section->countthread ?></i></span></td>
                <td class="hidden-xs" width="7%"><span class="stat"><i class="fa fa-comments-o fa"><?= $section->countpost ?></i></span></td>
                <td class="hidden-xs" width="20%" style="text-align: right">
                    <?php if ($section->lasttopicuser) : ?>
                    <?= $this->Html->link(__($section->lasttopicuser->title), ['controller' => 'Threads','action' => 'view', $section->lasttopicuser->thread_id]) ?>
                    <br>
                    <?php echo "le ".$section->lasttopicuser->created->i18nformat('dd/MM/YY à HH:mm', 'Europe/Paris') ; ?> <br>
                    <?php endif ?>
                    <?php if ($section->user) : ?>
                    <?php echo "par ".$section->user->username ; ?></td>
                <?php else: ?>
                Aucun Topic
                <?php endif ?>
            </tr>
<?php
$id = $section->id ;
        ?>

        <?php endforeach; ?>

        </tbody>
    </table>
    <?php endforeach; ?>
</div>
</div>

