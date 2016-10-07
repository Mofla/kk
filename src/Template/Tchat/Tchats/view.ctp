<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tchat'), ['action' => 'edit', $tchat->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tchat'), ['action' => 'delete', $tchat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tchat->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tchats'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tchat'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tchats view large-9 medium-8 columns content">
    <h3><?= h($tchat->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $tchat->has('user') ? $this->Html->link($tchat->user->id, ['controller' => 'Users', 'action' => 'view', $tchat->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($tchat->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($tchat->date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Message') ?></h4>
        <?= $this->Text->autoParagraph(h($tchat->message)); ?>
    </div>
</div>
