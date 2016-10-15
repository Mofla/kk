<div class="task-modal-base">
    <div class="task-modal-cont"></div>
</div>


<div class="projects view large-9 medium-8 columns content">
    <h3><?= h($project->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($project->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($project->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Users Number') ?></th>
            <td><?= $this->Number->format($project->users_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($project->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($project->end_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Finished') ?></th>
            <td><?= $project->finished ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($project->description)); ?>
    </div>
    <div class="nodes" id="mynetwork"></div>




    <?= $this->Html->script('../js/jquery.js') ?>
    <?= $this->Html->css('../assets/vis/vis.css') ?>
    <?= $this->Html->script('../assets/vis/vis.js') ?>
    <?= $this->Html->css('../assets/global/plugins/jquery-ui/jquery-ui.min.css') ?>
    <?= $this->Html->script('../assets/global/plugins/jquery-ui/jquery-ui.min.js') ?>
    <?= $this->Html->script('../assets/global/plugins/bootstrap/js/bootstrap.min.js') ?>


    <style type="text/css">
        .nodes {
            width: 100%;
            height: 600px;
            border: 1px solid lightgray;
        }

        p {
            max-width: 700px;
        }

        .vis-item.red {
            color: white;
            background-color: red;
            border-color: darkred;
        }
        .vis-item.orange {
            color: black;
            background-color: orange;
            border-color: orangered;
        }
        .vis-item.green {
            color: black;
            background-color: green;
            border-color: darkolivegreen;
        }

    </style>

    <!--node graph views-->

    <script type="text/javascript">
        // create an array with nodes
        var nodes = new vis.DataSet([
            <?php foreach ($project->tasks as $task): ?>
            {
                id: <?= $task->id ?>,
                label: '<?= h($task->name) ?>',
                <?php if ($task->state->name == 'todo'): ?>
                color: 'red'
                <?php endif; ?>
                <?php if ($task->state->name == 'doing'): ?>
                color: 'orange'
                <?php endif; ?>
                <?php if ($task->state->name == 'done'): ?>
                color: 'green'
                <?php endif; ?>
            },
            <?php endforeach; ?>

        ]);

        // create an array with edges
        var edges = new vis.DataSet([

            <?php foreach ($project->tasks as $task): ?>
            <?php if ($task->state->name == 'todo'): ?>
            {from: <?= $task->id ?>, to: 20000000001},
            <?php endif; ?>
            <?php if ($task->state->name == 'doing'): ?>
            {from: <?= $task->id ?>, to: 20000000002},
            <?php endif; ?>
            <?php if ($task->state->name == 'done'): ?>
            {from: <?= $task->id ?>, to: 20000000003},
            <?php endif; ?>
            <?php endforeach; ?>
        ]);

        // create a network
        var container = document.getElementById('mynetwork');
        var data = {
            nodes: nodes,
            edges: edges
        };
        var options = {
            "edges": {
                "arrows": {
                    "to": {
                        "enabled": true
                    }
                },
                "smooth": {
                    "forceDirection": "none"
                }
            },
            "interaction": {
                "hover": true,
                "navigationButtons": true
            },
            "physics": {
                "minVelocity": 0.75
            }
        };
        var network = new vis.Network(container, data, options);
    </script>

