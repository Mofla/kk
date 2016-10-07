<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Task'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tasks index large-9 medium-8 columns content">
    <h3><?= __('Tasks') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('state_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('project_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
            <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= $this->Number->format($task->id) ?></td>
                <td><?= h($task->name) ?></td>
                <td><?= $task->has('state') ? $this->Html->link($task->state->name, ['controller' => 'States', 'action' => 'view', $task->state->id]) : '' ?></td>
                <td><?= $task->has('project') ? $this->Html->link($task->project->name, ['controller' => 'Projects', 'action' => 'view', $task->project->id]) : '' ?></td>
                <td><?= h($task->start_date) ?></td>
                <td><?= h($task->end_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $task->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $task->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $task->id], ['confirm' => __('Are you sure you want to delete # {0}?', $task->id)]) ?>
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

<div id="visualization"></div>

<?= $this->Html->css('../assets/vis/vis.css') ?>
<?= $this->Html->script('../assets/vis/vis.js') ?>

<script type="text/javascript">
    var container = document.getElementById('visualization');
    var data = [
        <?php foreach ($tasks as $task): ?>

        {
            id: <?= $task->id ?>,
            content: '<?= h($task->name) ?>',
            start: '<?= h($task->start_date) ?>',
            end: '<?= h($task->end_date) ?>'
        },

        <?php endforeach; ?>

    ];
    var options = {};
    var timeline = new vis.Timeline(container, data, options);
</script>

<div id="mynetwork"></div>

<script type="text/javascript">
    // create an array with nodes
    var nodes = new vis.DataSet([
        {id: 201, label: 'TODO'},
        {id: 202, label: 'DOING'},
        {id: 203, label: 'DONE'},
        <?php foreach ($tasks as $task): ?>
        {id: <?= $task->id ?>, label: '<?= h($task->name) ?>'},
        <?php endforeach; ?>

    ]);

    // create an array with edges
    var edges = new vis.DataSet([
        <?php foreach ($tasks as $task): ?>
        <?php if ($task->state->name == 'todo'): ?>
        {from: <?= $task->id ?>, to: 201},
        <?php endif; ?>
        <?php if ($task->state->name == 'doing'): ?>
        {from: <?= $task->id ?>, to: 202},
        <?php endif; ?>
        <?php if ($task->state->name == 'done'): ?>
        {from: <?= $task->id ?>, to: 203},
        <?php endif; ?>
        <?php endforeach; ?>
    ]);

    // create a network
    var container = document.getElementById('mynetwork');
    var data = {
        nodes: nodes,
        edges: edges
    };
    var options = {};
    var network = new vis.Network(container, data, options);
</script>


