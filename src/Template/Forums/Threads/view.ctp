<div class="col-md-12">
        <?= $thread->has('forum') ? $this->Html->link($thread->forum->name, ['controller' => 'Forums', 'action' => 'view', $thread->forum->id]) : '' ?>
</div>
<div class="col-md-12 voffset2">


<div class="right">
    <a href="<?= $this->Url->build([ 'controller' => 'Posts', 'action' => 'add' , $thread->id]); ?>" class="btn btn-success " role="button" aria-pressed="true">REPONDRE</a>
</div>

<div class="row"></div>
<div class="table-responsive voffset2">
    <table class="table">
        <thead class="category">
        <tr>
            <th colspan="2" scope="row">
                <div><?= h($thread->subject) ?> </div>

            </th>
        </tr>
        <tr class="ssthead">
            <th width="25%" scope="col" >Auteur</th>
            <th width="75%" scope="col" >Message</th>
        </tr>
        </thead>
        <tbody>
        <tr class="sscategory">

            <td><?= $thread->has('user') ? $this->Html->link($thread->user->username, ['controller' => 'Users', 'action' => 'view', $thread->user->id]) : '' ?>
            <br>avatar
            </td>
            <td>
                <div class="pull-right"> Message: #1 </div>
                <div><?= $thread->text; ?></div>
            </td>
        </tr>


        <tr class="grey">

            <td>Créé le <?= h($thread->created) ?></td>
            <td>
                <div class="left">MP</div>
                <div class="right" >EDITER / CITER</div>
            </td>
        </tr>
        </tbody>
    </table>



    <div class="table-responsive">
        <?php if (!empty($thread->posts)): ?>
        <?php $messagecount = 1 ;?>
        <?php foreach ($thread->posts as $posts): ?>
        <?php $messagecount++ ;?>
        <table class="table mrgtbl">


            <tr class="sscategory">

                <td width="25%"><?= $this->Html->link($posts->user->username, ['controller' => 'Users', 'action' => 'view', $posts->user_id])  ?>
                    <br>avatar
                </td>
                <td width="75%">
                    <div class="pull-right"> Message: #<?= $messagecount ?></div>
                    <div><?= $posts->message; ?></div>
                </td>
            </tr>


            <tr class="grey">

                <td>Créé le <?= h($posts->created) ?></td>
                <td>
                    <div class="left">MP</div>
                    <div class="right" >EDITER / CITER</div>
                </td>
            </tr>
            <!--<tr>-->
                <!--<td><?= h($posts->id) ?></td>-->
                <!--<td><?= h($posts->title) ?></td>-->
                <!--<td><?= h($posts->message) ?></td>-->
                <!--<td><?= h($posts->created) ?></td>-->
                <!--<td><?= h($posts->modified) ?></td>-->
                <!--<td><?= h($posts->user_id) ?></td>-->
                <!--<td><?= h($posts->thread_id) ?></td>-->
                <!--<td class="actions">-->
                    <!--<?= $this->Html->link(__('View'), ['controller' => 'Posts', 'action' => 'view', $posts->id]) ?>-->
                    <!--<?= $this->Html->link(__('Edit'), ['controller' => 'Posts', 'action' => 'edit', $posts->id]) ?>-->
                    <!--<?= $this->Form->postLink(__('Delete'), ['controller' => 'Posts', 'action' => 'delete', $posts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $posts->id)]) ?>-->
                <!--</td>-->
            <!--</tr>-->
        </table>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="right">
            <a href="<?= $this->Url->build([ 'controller' => 'Posts', 'action' => 'add' , $thread->id]); ?>" class="btn btn-success " role="button" aria-pressed="true">REPONDRE</a>
        </div>
    </div>
</div>
</div>