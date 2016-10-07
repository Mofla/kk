<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $portfolio->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $portfolio->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Portfolios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="portfolios form large-9 medium-8 columns content">
    <?= $this->Form->create($portfolio) ?>
    <fieldset>
        <legend><?= __('Edit Portfolio') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('url');
            echo $this->Form->input('user_id');
            echo $this->Form->input('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
