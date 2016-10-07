<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Connector'), ['action' => 'edit', $connector->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Connector'), ['action' => 'delete', $connector->id], ['confirm' => __('Are you sure you want to delete # {0}?', $connector->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Connectors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Connector'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Permissions'), ['controller' => 'Permissions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permission'), ['controller' => 'Permissions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="connectors view large-9 medium-8 columns content">
    <h3><?= h($connector->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Controller') ?></th>
            <td><?= h($connector->controller) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Function') ?></th>
            <td><?= h($connector->function) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Permission') ?></th>
            <td><?= $connector->has('permission') ? $this->Html->link($connector->permission->name, ['controller' => 'Permissions', 'action' => 'view', $connector->permission->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($connector->id) ?></td>
        </tr>
    </table>
</div>
