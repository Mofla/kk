<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $forum->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $forum->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Forums'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Threads'), ['controller' => 'Threads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Thread'), ['controller' => 'Threads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="forums form large-9 medium-8 columns content">
    <?= $this->Form->create($forum) ?>
    <fieldset>
        <legend><?= __('Edit Forum') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('active');
            echo $this->Form->input('category_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
