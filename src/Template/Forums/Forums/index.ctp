<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">-->
    <!--<ul class="side-nav">-->
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <!--<li><?= $this->Html->link(__('New Forum'), ['action' => 'add']) ?></li>-->
        <!--<li><?= $this->Html->link(__('List Threads'), ['controller' => 'Threads', 'action' => 'index']) ?></li>-->
        <!--<li><?= $this->Html->link(__('New Thread'), ['controller' => 'Threads', 'action' => 'add']) ?></li>-->
    <!--</ul>-->
<!--</nav>-->

    <?= $this->element('Forum/search-forum') ?>


<div class="col-md-12 voffset3">
<div class="table-responsive">

            <?php foreach ($cat as $forum): ?>
    <table class="table">
        <thead class="category">
        <tr>
            <th colspan="2" scope="col"><span class="h4"><?= $forum->name ?></span></th>
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

                <td width="60%"> <?= $this->Html->link(__($section->name), ['action' => 'view', 'slug' => strtolower(str_replace(' ', '-', $section->name)), 'id' => $section->id]) ?>
                    <br>
                    <?= $section->description ?></td>
                <td class="hidden-xs" width="7%"><span class="hidden-s stat"><i class="fa fa-comment-o fa"><?= $section->countthread ?></i></span></td>
                <td class="hidden-xs" width="7%"><span class="stat"><i class="fa fa-comments-o fa"><?= $section->countpost ?></i></span></td>
                <td class="hidden-xs" width="20%" style="text-align: right">
                    <?php if ($section->lasttopicuser) : ?>
                    <?= $this->Html->link(__($section->lasttopicuser->title), ['controller' => 'Threads','action' => 'view'
                    , 'fid' => $section->id, 'forum' => strtolower(str_replace(' ', '-', $section->name)), 'slug' => strtolower(str_replace(' ', '-', $section->lasttopicuser->title)), 'id' => $section->lasttopicuser->thread_id]) ?>

                    <br>
                    <?php echo "le ".$section->lasttopicuser->created->i18nformat('dd/MM/YY à HH:mm', 'Europe/Paris') ; ?> <br>
                    <?php endif ?>
                    <?php if ($section->user) : ?>
                    par
                    <?= $this->Html->link($section->user->username, 'utilisateur/profil/'.$section->user->id.'') ?>
                </td>
                <?php else: ?>
                Aucun Sujet
                <?php endif ?>
            </tr>
<?php
$id = $section->id ;
        ?>

        <?php endforeach; ?>

        </tbody>
    </table>
    <?php endforeach; ?>
<!--__________________________________________________________________________________________________stats du forum-->

    <table class="table">
        <thead class="statforum">
        <tr>
            <th colspan="2" scope="col"><span class="h4">Statistiques du forum</span></th>
        </tr>
        </thead>
        <tbody>

        <tr class="sscategory">
            <td width="6%">

                <?= $this->Html->image("../uploads/icons/stat.png" , ['class' => 'forum-icon'])?>

            </td>
            <td width="94%">
                Nos membres ont créé un total de <?= $countpost ?> messages dans <?= $countthread ?> sujets.<br>
                Nous avons actuellement <?= $countuser ?> membres enregistrés.<br>
                Bienvenue à notre nouveau membre, <?= $this->Html->link($lastuser->username, 'utilisateur/profil/'.$lastuser->id.'') ?>
            </td>


        </tbody>
    </table>


</div>
</div>



