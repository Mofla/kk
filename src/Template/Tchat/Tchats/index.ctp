<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tchat'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tchats index large-9 medium-8 columns content">
    <h3><?= __('Tchats') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tchats as $tchat): ?>
            <tr>
                <td><?= $this->Number->format($tchat->id) ?></td>
                <td><?= $tchat->has('user') ? $this->Html->link($tchat->user->id, ['controller' => 'Users', 'action' => 'view', $tchat->user->id]) : '' ?></td>
                <td><?= h($tchat->date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tchat->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tchat->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tchat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tchat->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
