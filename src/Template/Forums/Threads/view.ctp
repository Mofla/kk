<div class="col-md-12">
    <?= $thread->has('forum') ? $this->Html->link($thread->forum->name, ['controller' => 'Forums', 'action' => 'view',
    $thread->forum->id]) : '' ?>
</div>
<div class="col-md-12 voffset2">

<?php $check = 'quotetopic' ; ?>
<div class="right">
    <a href="<?= $this->Url->build([ 'controller' => 'Posts', 'action' => 'add' , $thread->id]); ?>"
       class="btn btn-success " role="button" aria-pressed="true"> <i class="fa fa-comments-o"></i> REPONDRE</a>
</div>

<div class="row"></div>
<div class="table-responsive voffset2">
    <table class="table">
        <thead class="category">
        <tr>
            <th colspan="2" scope="row">
                <div><?= h($thread->subject) ?></div>

            </th>
        </tr>
        <tr class="ssthead">
            <th width="120px" scope="col">Auteur</th>
            <th scope="col">Message</th>
        </tr>
        </thead>
        <tbody>
        <tr class="sscategory">
            <td >
                <div class="username">
                    <?= $thread->has('user') ? $this->Html->link($thread->user->username, ['controller' => 'Users',
                    'action' => 'view', $thread->user->id]) : '' ?>
                </div>
                <div class="avatardiv">
                    <?= $this->Html->image('../uploads/imgs/'.$thread->user->picture_url ,['class'=>'avatar']); ?>
                </div>
            </td>
            <td>
                <div class="pull-right"> Message: #1</div>
                <div><?= $thread->text; ?></div>
            </td>
        </tr>


        <tr class="grey">

            <td><?= h($thread->created) ?></td>
            <td>
                <div class="left">MP</div>
                <div class="right">
                    <a href="<?= $this->Url->build([ 'controller' => 'Posts', 'action' => 'add' , $thread->id, $check]); ?>"
                       class="btn btn-sm blue" role="button" aria-pressed="true"><i class="fa fa-quote-right"></i> CITER</a>
                    <a href="<?= $this->Url->build([ 'controller' => 'Threads', 'action' => 'edit' , $thread->id]); ?>"
                       class="btn btn-sm purple" role="button" aria-pressed="true"><i class="fa fa-pencil"></i> EDITER</a>
                    <?= $this->Form->postLink(__('<i class="fa fa-times"></i>'),[ 'controller' => 'Threads'
                    , 'action' => 'delete' , $thread->id],['escape'=>false , 'class'=>'btn btn-sm btn-danger']); ?>

                </div>


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

                <td width="120px">
                    <div class="username">
                        <?= $this->Html->link($posts->user->username, ['controller' => 'Users', 'action' => 'view',
                        $posts->user_id]) ?>
                    </div>
                    <div class="avatardiv">
                        <?= $this->Html->image('../uploads/imgs/'.$posts->user->picture_url ,['class'=>'avatar']); ?>
                    </div>
                </td>
                <td>
                    <div class="pull-right"> Message: #<?= $messagecount ?></div>
                    <div><?= $posts->message; ?></div>
                </td>
            </tr>


            <tr class="grey">

                <td><?= h($posts->created) ?></td>
                <td>
                    <div class="left">MP</div>
                    <div class="right">
                        <a href="<?= $this->Url->build([ 'controller' => 'Posts', 'action' => 'add' , $thread->id, $posts->id]); ?>"
                           class="btn btn-sm blue" role="button" aria-pressed="true"><i class="fa fa-quote-right"></i> CITER</a>
                        <a href="<?= $this->Url->build([ 'controller' => 'Posts', 'action' => 'edit' , $posts->id]); ?>"
                           class="btn btn-sm purple" role="button" aria-pressed="true"><i class="fa fa-pencil"></i> EDITER</a>
                        <?= $this->Form->postLink(__('<i class="fa fa-times"></i>'),[ 'controller' => 'Posts'
                        , 'action' => 'delete' , $posts->id],['escape'=>false , 'class'=>'btn btn-sm btn-danger']); ?>

                    </div>
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
            <a href="<?= $this->Url->build([ 'controller' => 'Posts', 'action' => 'add' , $thread->id]); ?>"
               class="btn btn-success " role="button" aria-pressed="true"> <i class="fa fa-comments-o"></i> REPONDRE</a>
        </div>
    </div>
</div>
</div>