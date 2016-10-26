

<div class="rooms view large-9 medium-8 columns content">
    <legend>
        <?= h($room->name) ?>
        <?= $this->Html->link(__('Edit Room'), ['action' => 'edit', $room->id],['class'=>'btn default blue-stripe']) ?>
        <?= $this->Form->postLink(__('Delete Room'), ['action' => 'delete', $room->id], ['confirm' => __('Etes-vous sûr que vous voulez supprimer le salon {0} ?', $room->name),'class'=>'btn default red-stripe']) ?>
    </legend>

<h5><b><?= __('Name : ') ?></b></h5><p><?= h($room->name) ?></p>
<h5><b><?= __('Description : ') ?></b></h5><p>Avenir...</p>

    <div class="related">
        <legend><?= __('Users Dans Le Chat') ?></legend>
        <?php if (!empty($room->users)): ?>
        <table class="table table-striped table-bordered table-checkable order-column dataTable">
            <tr>
                <th><?= __('Pseudo') ?></th>
                <th><?= __('Prénom') ?></th>
                <th><?= __('Nom') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($room->users as $users): ?>
            <tr>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->firstname) ?></td>
                <td><?= h($users->lastname) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
