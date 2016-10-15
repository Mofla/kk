<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit From To Task'), ['action' => 'edit', $fromToTask->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete From To Task'), ['action' => 'delete', $fromToTask->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fromToTask->id)]) ?> </li>
        <li><?= $this->Html->link(__('List From To Tasks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New From To Task'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fromToTasks view large-9 medium-8 columns content">
    <h3><?= h($fromToTask->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Project') ?></th>
            <td><?= $fromToTask->has('project') ? $this->Html->link($fromToTask->project->name, ['controller' => 'Projects', 'action' => 'view', $fromToTask->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fromToTask->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('From Id') ?></th>
            <td><?= $this->Number->format($fromToTask->from_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('To Id') ?></th>
            <td><?= $this->Number->format($fromToTask->to_id) ?></td>
        </tr>
    </table>
</div>
