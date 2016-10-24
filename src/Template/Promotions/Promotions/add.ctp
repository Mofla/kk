<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Promotions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="promotions form large-9 medium-8 columns content">
    <?= $this->Form->create($promotion) ?>
    <fieldset>
        <legend><?= __('Add Promotion') ?></legend>
        <?php
            echo $this->Form->input('description');
            echo $this->Form->input('facebook_link');
            echo $this->Form->input('twitter_link');
            echo $this->Form->input('linkedin_link');
            echo $this->Form->input('cv_url');
            echo $this->Form->input('language_html');
            echo $this->Form->input('language_css');
            echo $this->Form->input('language_javascript');
            echo $this->Form->input('language_jquery');
            echo $this->Form->input('language_php');
            echo $this->Form->input('language_sql');
            echo $this->Form->input('language_cakephp');
            echo $this->Form->input('language_bootstrap');
            echo $this->Form->input('web_site');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
