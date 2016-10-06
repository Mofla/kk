<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
            <li><?= $this->Html->link(__('NOUVEAU SUJET'), ['controller' => 'Threads', 'action' => 'add']) ?></li>
  </ul>
</nav>
<div class="forums view large-9 medium-8 columns content">
    <h3><?= h($forum->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($forum->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($forum->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category Id') ?></th>
            <td><?= $this->Number->format($forum->category_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $forum->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($forum->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Threads') ?></h4>
        <?php if (!empty($forum->threads)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Subject') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Forum Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($forum->threads as $threads): ?>
            <tr>
                <td><?= h($threads->id) ?></td>
                <td><?= h($threads->subject) ?></td>
                <td><?= h($threads->created) ?></td>
                <td><?= h($threads->user_id) ?></td>
                <td><?= h($threads->forum_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Threads', 'action' => 'view', $threads->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Threads', 'action' => 'edit', $threads->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Threads', 'action' => 'delete', $threads->id], ['confirm' => __('Are you sure you want to delete # {0}?', $threads->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
