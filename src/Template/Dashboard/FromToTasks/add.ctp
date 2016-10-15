<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List From To Tasks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fromToTasks form large-9 medium-8 columns content">
    <?= $this->Form->create($fromToTask) ?>
    <fieldset>
        <legend><?= __('Add From To Task') ?></legend>
        <?php
            echo $this->Form->input('project_id', ['options' => $projects]);
            echo $this->Form->input('from_id');
            echo $this->Form->input('to_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
