<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Diary'), ['action' => 'edit', $diary->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Diary'), ['action' => 'delete', $diary->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diary->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Diaries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Diary'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Entries'), ['controller' => 'Entries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Entry'), ['controller' => 'Entries', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="diaries view large-9 medium-8 columns content">
    <h3><?= h($diary->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $diary->has('user') ? $this->Html->link($diary->user->id, ['controller' => 'Users', 'action' => 'view', $diary->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project') ?></th>
            <td><?= $diary->has('project') ? $this->Html->link($diary->project->name, ['controller' => 'Projects', 'action' => 'view', $diary->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($diary->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Entries') ?></h4>
        <?php if (!empty($diary->entries)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Diary Id') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Content') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($diary->entries as $entries): ?>
            <tr>
                <td><?= h($entries->id) ?></td>
                <td><?= h($entries->diary_id) ?></td>
                <td><?= h($entries->date) ?></td>
                <td><?= h($entries->content) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Entries', 'action' => 'view', $entries->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Entries', 'action' => 'edit', $entries->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Entries', 'action' => 'delete', $entries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $entries->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
