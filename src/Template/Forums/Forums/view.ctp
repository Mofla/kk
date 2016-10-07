<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('NOUVEAU SUJET'), ['controller' => 'Threads', 'action' => 'add',  $forum->id]) ?></li>
    </ul>
</nav>



<div class="table-responsive">
    <?php if (!empty($forum->threads)): ?>
    <table class="table">
        <tr>
            <th scope="col"><?= h($forum->name) ?></th>
        </tr>
        <?php foreach ($forum->threads as $threads): ?>
        <tr>
            <td><?= h($threads->id) ?></td>
            <td><?= h($threads->subject) ?></td>
            <td><?= h($threads->created) ?></td>
            <td><?= h($threads->user_id) ?></td>
            <td><?= h($threads->forum_id) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Threads', 'action' => 'view', $threads->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'Threads', 'action' => 'edit', $threads->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Threads', 'action' => 'delete', $threads->id], ['confirm' => __('Are you sure you want to delete # {0}?', $threads->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
</div>
</div>
