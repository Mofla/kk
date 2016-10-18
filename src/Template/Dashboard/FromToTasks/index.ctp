<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New From To Task'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fromToTasks index large-9 medium-8 columns content">
    <h3><?= __('From To Tasks') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('from_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('to_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fromToTasks as $fromToTask): ?>
            <tr>
                <td><?= $this->Number->format($fromToTask->id) ?></td>
                <td><?= $fromToTask->has('project') ? $this->Html->link($fromToTask->project->name, ['controller' => 'Projects', 'action' => 'view', $fromToTask->project->id]) : '' ?></td>
                <td><?= $this->Number->format($fromToTask->from_id) ?></td>
                <td><?= $this->Number->format($fromToTask->to_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fromToTask->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fromToTask->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fromToTask->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fromToTask->id)]) ?>
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