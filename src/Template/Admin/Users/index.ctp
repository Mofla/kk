<div>
    <a class="btn btn-info"
       href="users/add">
        <i class="glyphicon glyphicon-plus"></i> Nouvel Utilisateur</a>
</div>

<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
    <thead>
    <tr>
        <th><?= $this->Paginator->sort('username') ?></th>
        <th><?= $this->Paginator->sort('firstname') ?></th>
        <th><?= $this->Paginator->sort('lastname') ?></th>
        <th><?= $this->Paginator->sort('promotion') ?></th>
        <th><?= $this->Paginator->sort('role_id') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
    <tr class="odd gradeX">
        <td><?= h($user->username) ?></td>
        <td><?= h($user->firstname) ?></td>
        <td><?= h($user->lastname) ?></td>
        <td class="center"><?= h($user->promotion) ?></td>
        <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
        <td>
            <div class="btn-group">
                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown"
                        aria-expanded="false"> Actions
                    <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-left" role="menu">
                    <li><i class="icon-docs"></i><?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?></li>
                    <li><i class="icon-tag"></i><?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?></li>
                    <li><i class="icon-user"></i><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?></li>
                </ul>
            </div>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>