<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Blog Category'), ['action' => 'edit', $blogCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Blog Category'), ['action' => 'delete', $blogCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blogCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Blog Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blog Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Blog Articles'), ['controller' => 'BlogArticles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blog Article'), ['controller' => 'BlogArticles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="blogCategories view large-9 medium-8 columns content">
    <h3><?= h($blogCategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($blogCategory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($blogCategory->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Blog Articles') ?></h4>
        <?php if (!empty($blogCategory->blog_articles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Body') ?></th>
                <th scope="col"><?= __('Blog Category Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($blogCategory->blog_articles as $blogArticles): ?>
            <tr>
                <td><?= h($blogArticles->id) ?></td>
                <td><?= h($blogArticles->title) ?></td>
                <td><?= h($blogArticles->body) ?></td>
                <td><?= h($blogArticles->blog_category_id) ?></td>
                <td><?= h($blogArticles->created) ?></td>
                <td><?= h($blogArticles->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'BlogArticles', 'action' => 'view', $blogArticles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'BlogArticles', 'action' => 'edit', $blogArticles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BlogArticles', 'action' => 'delete', $blogArticles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blogArticles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
