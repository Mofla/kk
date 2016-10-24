<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Promotion'), ['action' => 'edit', $promotion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Promotion'), ['action' => 'delete', $promotion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Promotions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotion'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="promotions view large-9 medium-8 columns content">
    <h3><?= h($promotion->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $promotion->has('user') ? $this->Html->link($promotion->user->id, ['controller' => 'Users', 'action' => 'view', $promotion->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Facebook Link') ?></th>
            <td><?= h($promotion->facebook_link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Twitter Link') ?></th>
            <td><?= h($promotion->twitter_link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Linkedin Link') ?></th>
            <td><?= h($promotion->linkedin_link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cv Url') ?></th>
            <td><?= h($promotion->cv_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Web Site') ?></th>
            <td><?= h($promotion->web_site) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($promotion->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Language Html') ?></th>
            <td><?= $promotion->language_html ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Language Css') ?></th>
            <td><?= $promotion->language_css ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Language Javascript') ?></th>
            <td><?= $promotion->language_javascript ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Language Jquery') ?></th>
            <td><?= $promotion->language_jquery ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Language Php') ?></th>
            <td><?= $promotion->language_php ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Language Sql') ?></th>
            <td><?= $promotion->language_sql ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Language Cakephp') ?></th>
            <td><?= $promotion->language_cakephp ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Language Bootstrap') ?></th>
            <td><?= $promotion->language_bootstrap ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($promotion->description)); ?>
    </div>
</div>
