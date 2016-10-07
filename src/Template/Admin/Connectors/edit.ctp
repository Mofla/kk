<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $connector->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $connector->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Connectors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Permissions'), ['controller' => 'Permissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Permission'), ['controller' => 'Permissions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="connectors form large-9 medium-8 columns content">
    <?= $this->Form->create($connector) ?>
    <fieldset>
        <legend><?= __('Edit Connector') ?></legend>
        <?php
            echo $this->Form->input('controller');
            echo $this->Form->input('function');
            echo $this->Form->input('permission_id', ['options' => $permissions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
