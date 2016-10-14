


<div class="task-modal-base">
    <div class="task-modal-cont"></div>
</div>

<div class="portlet box blue">

    <div class="portlet-body">
        <div class="row">
            <div class="col-md-2' col-sm-2 col-xs-2" style="width: 130px;">
                <ul class="nav nav-tabs tabs-left">
                    <?php foreach ($projects as $project): ?>
                        <li class="">
                            <a href="#tab_<?= $project->id ?>" data-toggle="tab"
                               aria-expanded="false"> <?= $project->name ?> </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-10 col-sm-10 col-xs-10">
                <div class="tab-content">


                        <?php foreach ($projects as $project): ?>

                            <div class="tab-pane fade" id="tab_<?= $project->id ?>">

                                <div class="row">

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
                                                                        <span
                                                                            class="badge badge-default pull-right bg-white font-dark bold">3</span>
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
                                                                                <?= $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>', ['controller' => 'Tasks', 'action' => 'edit', $task->id], ['id' => 'task-'.$task->id,'class' => 'btn edittask', 'escape' => false]) ?>
                                                                            </div>

                                                                            <div class="list-item-content">
                                                                                <p><?= $task->description ?></p>
                                                                                <h3 class="uppercase">
                                                                                    <a href="javascript:;">un lien</a>
                                                                                </h3>
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
                                                                        <span
                                                                            class="badge badge-default pull-right bg-white font-dark bold">3</span>
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
                                                                                <?= $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>', ['controller' => 'Tasks', 'action' => 'edit', $task->id], ['id' => 'task-'.$task->id,'class' => 'btn edittask', 'escape' => false]) ?>
                                                                            </div>
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-close"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <p><?= $task->description ?></p>
                                                                                <h3 class="uppercase">
                                                                                    <a href="javascript:;">un
                                                                                        lien</a>
                                                                                </h3>
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
                                                                        <span
                                                                            class="badge badge-default pull-right bg-white font-dark bold">3</span>
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
                                                                                <?= $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>', ['controller' => 'Tasks', 'action' => 'edit', $task->id], ['id' => 'task-'.$task->id,'class' => 'btn edittask', 'escape' => false]) ?>
                                                                            </div>
                                                                            <div class="list-icon-container">
                                                                                <i class="icon-close"></i>
                                                                            </div>
                                                                            <div class="list-item-content">
                                                                                <p><?= $task->description ?></p>
                                                                                <h3 class="uppercase">
                                                                                    <a href="javascript:;">un
                                                                                        lien</a>
                                                                                </h3>
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
                                <div class="row">
                                    <div id="visualization-<?= $project->id ?>"></div>
                                    <div id="log"></div>
                                    <div class="nodes" id="mynetwork<?= $project->id ?>"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                </div>
            </div>
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
    .nodes {
        width: 600px;
        height: 400px;
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



    <?php foreach ($projects as $project): ?>
        <script type="text/javascript">
            var container = document.getElementById('visualization-<?= $project->id?>');

            var min = new Date(2016, 3, 1); // 1 april
            var max = new Date(2020, 3, 30, 23, 59, 59); // 30 april
            var items = new vis.DataSet([



                <?php foreach ($project->tasks as $task): ?>

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
                    <?php if ($task->state->name == "done"): ?>
                    className: 'green'
                    <?php endif; ?>

                },

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
                    if (item.end   > max) item.end   = max;

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
    <?php endforeach; ?>





    <?php foreach ($projects as $project): ?>

        <script type="text/javascript">
            // create an array with nodes
            var nodes = new vis.DataSet([
                {id: 20000000001, label: 'TODO', color: 'red'},
                {id: 20000000002, label: 'DOING', color: 'orange'},
                {id: 20000000003, label: 'DONE', color: 'green'},

                <?php foreach ($project->tasks as $task): ?>
                {id: <?= $task->id ?>, label: '<?= h($task->name) ?>'},
                <?php endforeach; ?>

            ]);

            // create an array with edges
            var edges = new vis.DataSet([
                {from: 20000000001, to: 20000000002},
                {from: 20000000002, to: 20000000003},
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
            var container = document.getElementById('mynetwork<?= $project->id?>');
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
            var network<?= $project->id?> = new vis.Network(container, data, options);
        </script>
    <?php endforeach; ?>

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


    </script>



