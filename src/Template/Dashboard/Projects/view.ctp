<div class="task-modal-base">
    <div class="task-modal-cont"></div>
</div>


<div class="container-fluid">
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">


            <div class="portlet-body">

                <div class="mt-element-list">
                    <div class="mt-list-head list-simple ext-1 font-white bg-blue-chambray">
                        <div class="list-head-title-container">
                            <div class="list-date"><?= $project->start_date ?></div>
                            <h4 class="list-title"><?= $project->name ?></h4>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 colum">
                        <div class="mt-list-head list-simple ext-1 font-white bg-red">
                            <div class="list-head-title-container">
                                <h4 class="list-title">
                                    TODO <?= $this->Html->link('<i class="glyphicon glyphicon-plus"></i>', ['controller' => 'Tasks', 'action' => 'add'], ['id' => 'add-' . $project->id, 'class' => 'add-task btn btn-danger', 'escape' => false]) ?>
                                </h4>
                            </div>
                        </div>
                        <div id="colum-1" class="colum">
                            <?php foreach ($project->tasks as $task): ?>
                                <?php if ($task->state->name === 'todo'): ?>
                                    <div id="task-<?= $task->id ?>"
                                         class="mt-list-container list-simple ext-1 group portle">
                                        <a class="list-toggle-container portlet-header"
                                           data-toggle="collapse"
                                           href="#pending-simple<?= $task->id ?>"
                                           aria-expanded="false">

                                            <div
                                                class="list-toggle uppercase"> <?= $task->name ?>

                                            </div>

                                        </a>
                                        <div class="panel-collapse collapse"
                                             id="pending-simple<?= $task->id ?>"
                                             aria-expanded="false">
                                            <ul>
                                                <li class="mt-list-item">
                                                    <div class="list-icon-container pull-right">
                                                        <?= $this->Form->postLink('<i class="glyphicon glyphicon-trash"></i>', ['controller' => 'Tasks', 'action' => 'delete', $task->id], ['class' => 'btn', 'escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $task->id)]) ?>
                                                    </div>
                                                    <div class="list-icon-container pull-right">
                                                        <?= $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>', ['controller' => 'Tasks', 'action' => 'edit', $task->id], ['id' => 'task-' . $task->id, 'class' => 'btn edittask', 'escape' => false]) ?>
                                                    </div>

                                                    <div class="list-item-content">
                                                        <p><?= $task->description ?></p>
                                                        <div
                                                            class="list-datetime"> <?= $task->start_date ?>
                                                            au <?= $task->end_date ?></div>

                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <div class="portlet portlet-sortable-empty"></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="mt-list-head list-simple ext-1 font-white bg-yellow">
                            <div class="list-head-title-container">
                                <h4 class="list-title">DOING</h4>
                            </div>
                        </div>

                        <div id="colum-2" class="colum">
                            <?php foreach ($project->tasks as $task): ?>
                                <?php if ($task->state->name === 'doing'): ?>
                                    <div id="task-<?= $task->id ?>"
                                         class="mt-list-container list-simple ext-1 group">
                                        <a class="list-toggle-container portlet-header"
                                           data-toggle="collapse"
                                           href="#pending-simple<?= $task->id ?>"
                                           aria-expanded="true">
                                            <div
                                                class="list-toggle uppercase"> <?= $task->name ?>
                                            </div>
                                        </a>
                                        <div class="panel-collapse collapse"
                                             id="pending-simple<?= $task->id ?>"
                                             aria-expanded="true">
                                            <ul>
                                                <li class="mt-list-item">
                                                    <div class="list-icon-container pull-right">
                                                        <?= $this->Form->postLink('<i class="glyphicon glyphicon-trash"></i>', ['controller' => 'Tasks', 'action' => 'delete', $task->id], ['class' => 'btn', 'escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $task->id)]) ?>
                                                    </div>
                                                    <div class="list-icon-container pull-right">
                                                        <?= $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>', ['controller' => 'Tasks', 'action' => 'edit', $task->id], ['id' => 'task-' . $task->id, 'class' => 'btn edittask', 'escape' => false]) ?>
                                                    </div>
                                                    <div class="list-item-content">
                                                        <p><?= $task->description ?></p>
                                                        <div
                                                            class="list-datetime"> <?= $task->start_date ?>
                                                            au <?= $task->end_date ?></div>

                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <div class="portlet portlet-sortable-empty"></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="mt-list-head list-simple ext-1 font-white bg-green">
                            <div class="list-head-title-container">
                                <h4 class="list-title">DONE</h4>
                            </div>
                        </div>
                        <div id="colum-3" class="colum">
                            <?php foreach ($project->tasks as $task): ?>
                                <?php if ($task->state->name === 'done'): ?>
                                    <div id="task-<?= $task->id ?>"
                                         class="mt-list-container list-simple ext-1 group">
                                        <a class="list-toggle-container portlet-header"
                                           data-toggle="collapse"
                                           href="#pending-simple<?= $task->id ?>"
                                           aria-expanded="true">
                                            <div
                                                class="list-toggle uppercase"> <?= $task->name ?>
                                            </div>
                                        </a>
                                        <div class="panel-collapse collapse"
                                             id="pending-simple<?= $task->id ?>"
                                             aria-expanded="true">
                                            <ul>
                                                <li class="mt-list-item">
                                                    <div class="list-icon-container pull-right">
                                                        <?= $this->Form->postLink('<i class="glyphicon glyphicon-trash"></i>', ['controller' => 'Tasks', 'action' => 'delete', $task->id], ['class' => 'btn', 'escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $task->id)]) ?>
                                                    </div>
                                                    <div class="list-icon-container pull-right">
                                                        <?= $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>', ['controller' => 'Tasks', 'action' => 'edit', $task->id], ['id' => 'task-' . $task->id, 'class' => 'btn edittask', 'escape' => false]) ?>
                                                    </div>
                                                    <div class="list-item-content">
                                                        <p><?= $task->description ?></p>
                                                        <div
                                                            class="list-datetime"> <?= $task->start_date ?>
                                                            au <?= $task->end_date ?></div>

                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <div class="portlet-sortable-empty ui-state-disabled"></div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="row">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3>TIMELINE</h3>
            </div>
            <div class="panel-body">
                <div id="visualization-<?= $project->id ?>"></div>
            </div>
        </div>
        <div class="panel panel-success">
            <div class="panel panel-heading">
                <h3>Hiérarchisation des tâches</h3>
            </div>
            <div class="panel-body">

                <h3>Options de la vue en arbre :</h3><br>

                <input type="button" id="btn-UD" value="Up-Down" class="btn btn-default">
                <input type="button" id="btn-DU" value="Down-Up" class="btn btn-default">
                <input type="button" id="btn-LR" value="Left-Right" class="btn btn-default">
                <input type="button" id="btn-RL" value="Right-Left" class="btn btn-default">
                <input type="hidden" id='direction' value="UD">
                <select id="layout" class="form-control">
                    <option value="directed-true">directed</option>
                    <option value="hubsize-true">hubsize</option>
                    <option value="directed-false">none</option>
                </select>

                <div id="network-popUp">
                    <span id="operation">node</span> <br>
                    <table style="margin:auto;">
                        <tr>
                            <td>id</td>
                            <td><input id="node-id" value="new value"/></td>
                        </tr>
                        <tr>
                            <td>label</td>
                            <td><input id="node-label" value="new value"/></td>
                        </tr>
                    </table>
                    <input type="button" value="save" id="saveButton"/>
                    <input type="button" value="cancel" id="cancelButton"/>
                </div>
                <br/>
                <div class="nodes" id="mynetwork"></div>

            </div>
        </div>

    </div>


    <?= $this->Html->script('../js/jquery.js') ?>
    <?= $this->Html->css('../assets/vis/vis.css') ?>
    <?= $this->Html->script('../assets/vis/vis.js') ?>
    <?= $this->Html->css('../assets/global/plugins/jquery-ui/jquery-ui.min.css') ?>
    <?= $this->Html->script('../assets/global/plugins/jquery-ui/jquery-ui.min.js') ?>
    <?= $this->Html->script('../assets/global/plugins/bootstrap/js/bootstrap.min.js') ?>


    <?= $this->Html->css('sweetalert.css') ?>
    <?= $this->Html->script('sweetalert.min.js') ?>

    <style type="text/css">
        #mynetwork {
            position: relative;
            width: 100%;
            height: 800px;
            border: 1px solid lightgray;
        }

        table.legend_table {
            font-size: 11px;
            border-width: 1px;
            border-color: #d3d3d3;
            border-style: solid;
        }

        table.legend_table, td {
            border-width: 1px;
            border-color: #d3d3d3;
            border-style: solid;
            padding: 2px;
        }

        div.table_content {
            width: 80px;
            text-align: center;
        }

        div.table_description {
            width: 100px;
        }

        #operation {
            font-size: 28px;
        }

        #network-popUp {
            display: none;
            position: absolute;
            top: 350px;
            left: 170px;
            z-index: 299;
            width: 250px;
            height: 120px;
            background-color: #f9f9f9;
            border-style: solid;
            border-width: 3px;
            border-color: #5394ed;
            padding: 10px;
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


    <!--generates timelines-->

    <script type="text/javascript">
        var container = document.getElementById('visualization-<?= $project->id?>');

        var min = new Date(2016, 3, 1); // 1 april
        var max = new Date(2020, 3, 30, 23, 59, 59); // 30 april
        var items = new vis.DataSet([



            <?php foreach ($project->tasks as $task): ?>
            <?php if ($task->state->name !== 'done'): ?>

            {
                id: <?= $task->id ?>,
                content: '<?= h($task->name) ?>',
                start: '<?= h($task->start_date) ?>',
                end: '<?= h($task->end_date) ?>',
                <?php if ($task->state->name == "todo"): ?>
                className: 'red'
                <?php endif; ?>
                <?php if ($task->state->name == "doing"): ?>
                className: 'orange'
                <?php endif; ?>

            },
            <?php endif; ?>
            <?php endforeach; ?>
        ]);
        var options = {
            editable: true,

            onMove: function (item, callback) {
                var title = 'Voulez-vous vraiment changer les dates de cette tâche \n' +
                    'début: ' + item.start + '\n' +
                    'fin: ' + item.end + '?';

                prettyConfirm('Changer les dates', title, function (ok) {
                    if (ok) {
                        callback(item); // send back item as confirmation (can be changed)
                    }
                    else {
                        callback(null); // cancel editing item
                    }
                });
            },

            onMoving: function (item, callback) {
                if (item.start < min) item.start = min;
                if (item.start > max) item.start = max;
                if (item.end > max) item.end = max;

                callback(item); // send back the (possibly) changed item
            },

            onRemove: function (item, callback) {
                prettyConfirm('Supprimer la tâche', 'Voulez-vous vraiment supprimer la tâche ' + item.content + '?', function (ok) {
                    if (ok) {
                        callback(item); // confirm deletion
                    }
                    else {
                        callback(null); // cancel deletion
                    }
                });
            }
        };

        var timeline = new vis.Timeline(container, items, options);

        items.on('*', function (event, properties) {
            logEvent(event, properties);
        });


        /*Saves edits to tasks from timeline*/
        function logEvent(event, properties) {

            var eventType = JSON.stringify(event);

            var start = JSON.stringify(properties.data[0].start).split('T');
            var end = JSON.stringify(properties.data[0].end).split('T');
            var datAjax = {
                start_date: start[0].substring(1),
                end_date: end[0].substring(1)
            };

            $.ajax({
                type: "POST",
                data: datAjax,
                url: '<?= $this->Url->build(["controller" => "Tasks", "action" => "editation"]); ?>' + '/' + properties.data[0].id
            });
        }

        function prettyConfirm(title, text, callback) {
            swal({
                title: title,
                text: text,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#DD6B55"
            }, callback);
        }

        function prettyPrompt(title, text, inputValue, callback) {
            swal({
                title: title,
                text: text,
                type: 'input',
                showCancelButton: true,
                inputValue: inputValue
            }, callback);
        }

    </script>


    <!--node graph views-->

    <script type="text/javascript">
        var directionInput = document.getElementById("direction");
        var btnUD = document.getElementById("btn-UD");
        btnUD.onclick = function () {
            directionInput.value = "UD";
            draw();
        }
        var btnDU = document.getElementById("btn-DU");
        btnDU.onclick = function () {
            directionInput.value = "DU";
            draw();
        };
        var btnLR = document.getElementById("btn-LR");
        btnLR.onclick = function () {
            directionInput.value = "LR";
            draw();
        };
        var btnRL = document.getElementById("btn-RL");
        btnRL.onclick = function () {
            directionInput.value = "RL";
            draw();
        };


        var dropdown = document.getElementById("layout");
        dropdown.onchange = function () {
            var opt = dropdown.value.split('-');
            layoutMethod = opt[0];
            if (opt[1] == 'false') {
                layoutBool = false
            } else (layoutBool = true);
            draw();
        };

        var layoutMethod = "directed";
        var layoutBool = true;


        function cleanPonctuation(data) {
            return data.replace(/'/g, "\\'");
        }


        function draw() {

            var directionInput = document.getElementById("direction").value;

            // create an array with nodes
            var nodes = new vis.DataSet([
                {
                    id: 'end',
                    size: 10,
                    label: "Fin du projet",
                    shape: 'box',
                    font: {'face': 'monospace', 'align': 'left'},
                    color: 'blue'
                },
                <?php foreach ($project->tasks as $task): ?>

                {
                    id: <?= $task->id ?>,
                    size: 10,
                    label: "<?= $task->name ?>",
                    shape: 'box',
                    font: {'face': 'monospace', 'align': 'left'},
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
                <?php foreach ($endPoints as $endPoint) : ?>

                {from: <?= $endPoint->id ?>, to: 'end'},
                <?php endforeach; ?>

                <?php foreach ($project->from_to_tasks as $fromto) : ?>
                {from: <?= $fromto->from_id ?>, to: <?= $fromto->to_id ?>},
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
                    "minVelocity": 0.75,
                    hierarchicalRepulsion: {
                        nodeDistance: 200
                    }
                },
                layout: {
                    hierarchical: {
                        enabled: layoutBool,
                        sortMethod: layoutMethod,
                        levelSeparation: 200,
                        direction: directionInput
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
                        document.getElementById('cancelButton').onclick = cancelEdit.bind(this, callback);
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
                            var datAjax = {
                                project_id: <?= $project->id ?>,
                                from_id: data.from,
                                to_id: data.to
                            }
                            var ajax = $.ajax({
                                type: "POST",
                                data: datAjax,
                                url: '<?= $this->Url->build(["controller" => "FromToTasks", "action" => "add"]); ?>'
                            });


                            callback(data);
                        }
                    },
                    deleteEdge: function (data, callback) {

                        //gets the id of the deleted edge and gets connected nodes ids before deleting them
                        var keyD = data.edges[0];
                        var array = $.map(edges._data, function (value, index) {
                            return [value];
                        });

                        for (var i = 0; i < array.length; i++) {
                            if (array[i].id == keyD) {
                                var datAjax = {
                                    project_id: <?= $project->id ?>,
                                    from_id: array[i].from,
                                    to_id: array[i].to
                                }
                                var ajax = $.ajax({
                                    type: "POST",
                                    data: datAjax,
                                    url: '<?= $this->Url->build(["controller" => "FromToTasks", "action" => "deleteajax"]); ?>'
                                });


                            }
                        }


                        callback(data);
                    }
                }
            };
            network = new vis.Network(container, data, options);


            // add event listeners
            network.on('select', function (params) {
                document.getElementById('selection').innerHTML = 'Selection: ' + params.nodes;
            });
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

        function saveData(data, callback) {
            data.id = document.getElementById('node-id').value;
            data.label = document.getElementById('node-label').value;
            clearPopUp();
            callback(data);
        }

        draw();
    </script>

    <style>
        .ui-state-highlight {
            height: 3em;
            line-height: 1.2em;
        }
    </style>
    <script>

        //sortable stuff
        $("#colum-1, #colum-2, #colum-3").sortable({

            connectWith: ".colum",
            handle: ".portlet-header",
            cancel: ".portlet-toggle",
            placeholder: "ui-state-highlight",
            receive: function (event, ui) {
                //gets taks id and column id aka state id
                var elemID = ui.item.attr('id').split('-');
                var newPos = $(this).attr('id').split('-');

                //populates data for ajax post
                var data = {
                    state_id: parseInt(newPos[1])
                };
                //ajax post
                $.ajax({
                    type: "POST",
                    data: data,
                    url: '<?= $this->Url->build(["controller" => "Tasks", "action" => "editation"]); ?>' + '/' + elemID[1]
                });
            }
        });


        $(".portlet-toggle").on("click", function () {
            var icon = $(this);
            icon.toggleClass("ui-icon-minusthick ui-icon-plusthick");
            icon.closest(".portlet").find(".portlet-content").toggle();
        });


        //task add modal
        $(document).on('click', '.add-task', function (event) {
            event.preventDefault();
            var id = $(this).attr('id').split('-');

            var url = '<?= $this->Url->build(['controller' => 'Tasks', 'action' => 'addtask']); ?>' + '/' + id[1];


            $('.task-modal-cont').load(url, function (result) {
                $('#taskModal').modal({show: true});
            });
        });

        //task edit modal
        $(document).on('click', '.edittask', function (event) {
            event.preventDefault();
            var id = $(this).attr('id').split('-');

            var url = '<?= $this->Url->build(['controller' => 'Tasks', 'action' => 'edittask']); ?>' + '/' + id[1];


            $('.task-modal-cont').load(url, function (result) {
                $('#taskModal').modal({show: true});
            });
        });

        //project add modal
        $(document).on('click', '.project-add', function (event) {
            event.preventDefault();

            var url = '<?= $this->Url->build(['controller' => 'Projects', 'action' => 'add']); ?>';


            $('.task-modal-cont').load(url, function (result) {
                $('#taskModal').modal({show: true});
            });
        });


    </script>