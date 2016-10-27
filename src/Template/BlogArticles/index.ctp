
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Blog Article'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Blog Categories'), ['controller' => 'BlogCategories', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="blogArticles index large-9 medium-8 columns content">
    <h3><?= __('Blog Articles') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('blog_category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($blogArticles as $blogArticle): ?>
            <tr>
                <td><?= $this->Number->format($blogArticle->id) ?></td>
                <td><?= h($blogArticle->title) ?></td>
                <td><?= $blogArticle->has('blog_category') ? $this->Html->link($blogArticle->blog_category->name, ['controller' => 'BlogCategories', 'action' => 'view', $blogArticle->blog_category->id]) : '' ?></td>
                <td><?= h($blogArticle->created) ?></td>
                <td><?= h($blogArticle->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $blogArticle->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $blogArticle->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $blogArticle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blogArticle->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
