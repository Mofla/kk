<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Permissions Role'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Permissions'), ['controller' => 'Permissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Permission'), ['controller' => 'Permissions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="permissionsRoles index large-9 medium-8 columns content">
    <h3><?= __('Permissions Roles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('permission_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($permissionsRoles as $permissionsRole): ?>
            <tr>
                <td><?= $permissionsRole->has('permission') ? $this->Html->link($permissionsRole->permission->name, ['controller' => 'Permissions', 'action' => 'view', $permissionsRole->permission->id]) : '' ?></td>
                <td><?= $permissionsRole->has('role') ? $this->Html->link($permissionsRole->role->name, ['controller' => 'Roles', 'action' => 'view', $permissionsRole->role->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $permissionsRole->permission_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $permissionsRole->permission_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $permissionsRole->permission_id], ['confirm' => __('Are you sure you want to delete # {0}?', $permissionsRole->permission_id)]) ?>
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
