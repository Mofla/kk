<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">

        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
        <?= $thread->has('forum') ? $this->Html->link($thread->forum->name, ['controller' => 'Forums', 'action' => 'view', $thread->forum->id]) : '' ?>
<div class="table-responsive">
    <table class="table">
        <thead class="category">
        <tr>
            <th colspan="2" scope="row"><?= h($thread->subject) ?></th>
        </tr>
        <tr class="ssthead">
            <th scope="col" >Auteur</th>
            <th scope="col" >Message</th>
        </tr>
        </thead>
        <tbody>
        <tr>

            <td><?= $thread->has('user') ? $this->Html->link($thread->user->id, ['controller' => 'Users', 'action' => 'view', $thread->user->id]) : '' ?></td>
        </tr>

        <tr>

            <td><?= $this->Number->format($thread->id) ?></td>
        </tr>
        <tr>

            <td><?= h($thread->created) ?></td>
        </tr>
        </tbody>
    </table>
    <div class="row">
        <h4><?= __('Text') ?></h4>
        <?= $this->Text->autoParagraph(h($thread->text)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Posts') ?></h4>
        <?php if (!empty($thread->posts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Thread Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($thread->posts as $posts): ?>
            <tr>
                <td><?= h($posts->id) ?></td>
                <td><?= h($posts->title) ?></td>
                <td><?= h($posts->message) ?></td>
                <td><?= h($posts->created) ?></td>
                <td><?= h($posts->modified) ?></td>
                <td><?= h($posts->user_id) ?></td>
                <td><?= h($posts->thread_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Posts', 'action' => 'view', $posts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Posts', 'action' => 'edit', $posts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Posts', 'action' => 'delete', $posts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $posts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
