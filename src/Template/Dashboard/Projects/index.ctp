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
                    <div class="column">

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
                                                            TODO <?= $this->Html->link('<i class="glyphicon glyphicon-plus"></i>', ['controller' => 'Tasks', 'action' => 'add'], ['class' => 'btn btn-danger', 'escape' => false]) ?>
                                                        </h4>

                                                    </div>
                                                </div>
                                                <div id="colum1" class="colum">
                                                    <?php foreach ($project->tasks as $task): ?>
                                                        <?php if ($task->state->name === 'todo'): ?>
                                                            <div
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
                                                                                <?= $this->Form->postLink('<i class="glyphicon glyphicon-trash"></i>', ['action' => 'delete', $task->id], ['class' => 'btn', 'escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $task->id)]) ?>
                                                                            </div>
                                                                            <div class="list-icon-container pull-right">
                                                                                <?= $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>', ['action' => 'edit', $task->id], ['class' => 'btn', 'escape' => false]) ?>
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

                                                <div id="colum2" class="colum">
                                                    <?php foreach ($project->tasks as $task): ?>
                                                        <?php if ($task->state->name === 'doing'): ?>
                                                            <div class="mt-list-container list-simple ext-1 group">
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
                                                    <div id="colum3" class="colum">
                                                        <?php foreach ($project->tasks as $task): ?>
                                                            <?php if ($task->state->name === 'done'): ?>
                                                                <div
                                                                    class="mt-list-container list-simple ext-1 group">
                                                                    <a class="list-toggle-container"
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
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div id="visualization-<?= $project->id ?>"></div>
                                    <div class="nodes" id="mynetwork<?= $project->id ?>"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <?= $this->Html->css('../assets/vis/vis.css') ?>
            <?= $this->Html->script('../assets/vis/vis.js') ?>
            <?= $this->Html->css('../assets/global/plugins/jquery-ui/jquery-ui.min.css') ?>
            <?= $this->Html->script('../assets/global/plugins/jquery-ui/jquery-ui.min.js') ?>


            <?php foreach ($projects as $project): ?>
                <script type="text/javascript">
                    var container = document.getElementById('visualization-<?= $project->id?>');
                    var data = [


                        <?php foreach ($project->tasks as $task): ?>

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
            <?php endforeach; ?>


            <style type="text/css">
                .nodes {
                    width: 100%;
                    height: 500px;
                    border: 1px solid lightgray;
                }

                p {
                    max-width: 700px;
                }
            </style>


            <?php foreach ($projects as $project): ?>

                <script type="text/javascript">
                    // create an array with nodes
                    var nodes = new vis.DataSet([
                        {id: 201, label: 'TODO', color: 'red'},
                        {id: 202, label: 'DOING', color: 'orange'},
                        {id: 203, label: 'DONE', color: 'green'},

                        <?php foreach ($project->tasks as $task): ?>
                        <?php foreach ($task->users as $user): ?>
                        {id: '<?= $task->id ?>' +<?= $user->id ?>, label: '<?= h($user->username) ?>'},
                        <?php endforeach; ?>
                        {id: <?= $task->id ?>, label: '<?= h($task->name) ?>'},

                        <?php endforeach; ?>

                    ]);

                    // create an array with edges
                    var edges = new vis.DataSet([
                        {from: 201, to: 202},
                        {from: 202, to: 203},
                        <?php foreach ($project->tasks as $task): ?>
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
                    var container = document.getElementById('mynetwork<?= $project->id?>');
                    var data = {
                        nodes: nodes,
                        edges: edges
                    };
                    var options = {};
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


                $("#colum1, #colum2, #colum3").sortable({
                    connectWith: ".colum",
                    handle: ".portlet-header",
                    cancel: ".portlet-toggle",
                    placeholder: "ui-state-highlight",
                    stop: function () {
                        console.log($(this).attr('id'));
                    }
                });


                $(".portlet-toggle").on("click", function () {
                    var icon = $(this);
                    icon.toggleClass("ui-icon-minusthick ui-icon-plusthick");
                    icon.closest(".portlet").find(".portlet-content").toggle();
                });


            </script>



