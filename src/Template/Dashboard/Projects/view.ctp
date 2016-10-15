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

    Options de la vue en arbre :
    <select id="layout">
        <option value="hubsize-true">hubsize</option>
        <option value="directed-true">directed</option>
        <option value="directed-false">none</option>
    </select><br/>

    <div id="network-popUp">
        <span id="operation">node</span> <br>
        <table style="margin:auto;"><tr>
                <td>id</td><td><input id="node-id" value="new value" /></td>
            </tr>
            <tr>
                <td>label</td><td><input id="node-label" value="new value" /></td>
            </tr></table>
        <input type="button" value="save" id="saveButton" />
        <input type="button" value="cancel" id="cancelButton" />
    </div>
    <br />
    <div class="nodes" id="mynetwork"></div>
    <p id="selection"></p>




    <?= $this->Html->script('../js/jquery.js') ?>
    <?= $this->Html->css('../assets/vis/vis.css') ?>
    <?= $this->Html->script('../assets/vis/vis.js') ?>
    <?= $this->Html->css('../assets/global/plugins/jquery-ui/jquery-ui.min.css') ?>
    <?= $this->Html->script('../assets/global/plugins/jquery-ui/jquery-ui.min.js') ?>
    <?= $this->Html->script('../assets/global/plugins/bootstrap/js/bootstrap.min.js') ?>


    <style type="text/css">
        #mynetwork {
            position:relative;
            width: 800px;
            height: 600px;
            border: 1px solid lightgray;
        }
        table.legend_table {
            font-size: 11px;
            border-width:1px;
            border-color:#d3d3d3;
            border-style:solid;
        }
        table.legend_table,td {
            border-width:1px;
            border-color:#d3d3d3;
            border-style:solid;
            padding: 2px;
        }
        div.table_content {
            width:80px;
            text-align:center;
        }
        div.table_description {
            width:100px;
        }

        #operation {
            font-size:28px;
        }
        #network-popUp {
            display:none;
            position:absolute;
            top:350px;
            left:170px;
            z-index:299;
            width:250px;
            height:120px;
            background-color: #f9f9f9;
            border-style:solid;
            border-width:3px;
            border-color: #5394ed;
            padding:10px;
            text-align: center;
        }
    </style>
    <style type="text/css">

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





        var dropdown = document.getElementById("layout");
        dropdown.onchange = function() {
            var opt = dropdown.value.split('-');
            layoutMethod = opt[0];
            if (opt[1] == 'false') {layoutBool = false} else (layoutBool = true);
            draw();
        };

        var layoutMethod = "directed";
        var layoutBool = true;

        function draw() {

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
            var data = {
                nodes: nodes,
                edges: edges
            };

            // create a network
            var container = document.getElementById('mynetwork');

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
                },
                layout: {
                    hierarchical: {
                        enabled:layoutBool,
                        sortMethod: layoutMethod
                    }
                },

                manipulation: {
                    addNode: function (data, callback) {
                        // filling in the popup DOM elements
                        document.getElementById('operation').innerHTML = "Add Node";
                        document.getElementById('node-id').value = data.id;
                        document.getElementById('node-label').value = data.label;
                        document.getElementById('saveButton').onclick = saveData.bind(this, data, callback);
                        document.getElementById('cancelButton').onclick = clearPopUp.bind();
                        document.getElementById('network-popUp').style.display = 'block';
                    },
                    editNode: function (data, callback) {
                        // filling in the popup DOM elements
                        document.getElementById('operation').innerHTML = "Edit Node";
                        document.getElementById('node-id').value = data.id;
                        document.getElementById('node-label').value = data.label;
                        document.getElementById('saveButton').onclick = saveData.bind(this, data, callback);
                        document.getElementById('cancelButton').onclick = cancelEdit.bind(this,callback);
                        document.getElementById('network-popUp').style.display = 'block';
                    },
                    addEdge: function (data, callback) {
                        if (data.from == data.to) {
                            var r = confirm("Do you want to connect the node to itself?");
                            if (r == true) {
                                callback(data);
                            }
                        }
                        else {
                            callback(data);
                        }
                    }
                }
            };
            network = new vis.Network(container, data, options);
        }

        function clearPopUp() {
            document.getElementById('saveButton').onclick = null;
            document.getElementById('cancelButton').onclick = null;
            document.getElementById('network-popUp').style.display = 'none';
        }

        function cancelEdit(callback) {
            clearPopUp();
            callback(null);
        }

        function saveData(data,callback) {
            data.id = document.getElementById('node-id').value;
            data.label = document.getElementById('node-label').value;
            clearPopUp();
            callback(data);
        }
        draw();
    </script>

