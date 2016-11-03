<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Blog Article'), ['action' => 'edit', $blogArticle->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Blog Article'), ['action' => 'delete', $blogArticle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blogArticle->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Blog Articles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blog Article'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Blog Categories'), ['controller' => 'BlogCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blog Category'), ['controller' => 'BlogCategories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="blogArticles view large-9 medium-8 columns content">
    <h3><?= h($blogArticle->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($blogArticle->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Blog Category') ?></th>
            <td><?= $blogArticle->has('blog_category') ? $this->Html->link($blogArticle->blog_category->name, ['controller' => 'BlogCategories', 'action' => 'view', $blogArticle->blog_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($blogArticle->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($blogArticle->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($blogArticle->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Body') ?></h4>
        <?= $this->Text->autoParagraph(h($blogArticle->body)); ?>
    </div>
</div>
