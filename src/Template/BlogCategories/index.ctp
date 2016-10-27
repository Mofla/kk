<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Blog Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Blog Articles'), ['controller' => 'BlogArticles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Blog Article'), ['controller' => 'BlogArticles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="blogCategories index large-9 medium-8 columns content">
    <h3><?= __('Blog Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($blogCategories as $blogCategory): ?>
            <tr>
                <td><?= $this->Number->format($blogCategory->id) ?></td>
                <td><?= h($blogCategory->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $blogCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $blogCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $blogCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blogCategory->id)]) ?>
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
