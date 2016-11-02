<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Blog Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Blog Articles'), ['controller' => 'BlogArticles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Blog Article'), ['controller' => 'BlogArticles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="blogCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($blogCategory) ?>
    <fieldset>
        <legend><?= __('Add Blog Category') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
