<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Rooms User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="roomsUsers index large-9 medium-8 columns content">
    <h3><?= __('Rooms Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('room_id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roomsUsers as $roomsUser): ?>
            <tr>
                <td><?= $this->Number->format($roomsUser->id) ?></td>
                <td><?= $roomsUser->has('room') ? $this->Html->link($roomsUser->room->name, ['controller' => 'Rooms', 'action' => 'view', $roomsUser->room->id]) : '' ?></td>
                <td><?= $roomsUser->has('user') ? $this->Html->link($roomsUser->user->id, ['controller' => 'Users', 'action' => 'view', $roomsUser->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $roomsUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $roomsUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $roomsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roomsUser->id)]) ?>
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
