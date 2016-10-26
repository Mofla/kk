<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rooms User'), ['action' => 'edit', $roomsUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rooms User'), ['action' => 'delete', $roomsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roomsUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rooms Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rooms User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="roomsUsers view large-9 medium-8 columns content">
    <h3><?= h($roomsUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Room') ?></th>
            <td><?= $roomsUser->has('room') ? $this->Html->link($roomsUser->room->name, ['controller' => 'Rooms', 'action' => 'view', $roomsUser->room->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $roomsUser->has('user') ? $this->Html->link($roomsUser->user->id, ['controller' => 'Users', 'action' => 'view', $roomsUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($roomsUser->id) ?></td>
        </tr>
    </table>
</div>
