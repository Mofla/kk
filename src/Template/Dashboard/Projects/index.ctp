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
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <div class="mt-list-head list-simple ext-1 font-white bg-red">
                                                <div class="list-head-title-container">
                                                    <h4 class="list-title">TODO</h4>
                                                </div>
                                            </div>
                                            <?php foreach ($project->tasks as $task): ?>
                                                <?php if ($task->state->name === 'todo'): ?>
                                                    <div class="mt-list-container list-simple ext-1 group">
                                                        <a class="list-toggle-container" data-toggle="collapse"
                                                           href="#pending-simple<?= $task->id ?>"
                                                           aria-expanded="true">
                                                            <div class="list-toggle uppercase"> <?= $task->name ?>
                                                                <span
                                                                    class="badge badge-default pull-right bg-white font-dark bold">3</span>
                                                            </div>
                                                        </a>
                                                        <div class="panel-collapse collapse in"
                                                             id="pending-simple<?= $task->id ?>"
                                                             aria-expanded="false">
                                                            <ul>
                                                                <li class="mt-list-item">
                                                                    <div class="list-icon-container">
                                                                        <i class="icon-close"></i>
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
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <div class="mt-list-head list-simple ext-1 font-white bg-yellow">
                                                <div class="list-head-title-container">
                                                    <h4 class="list-title">DOING</h4>
                                                </div>
                                            </div>
                                            <?php foreach ($project->tasks as $task): ?>
                                                <?php if ($task->state->name === 'doing'): ?>
                                                    <div class="mt-list-container list-simple ext-1 group">
                                                        <a class="list-toggle-container" data-toggle="collapse"
                                                           href="#pending-simple<?= $task->id ?>"
                                                           aria-expanded="true">
                                                            <div class="list-toggle uppercase"> <?= $task->name ?>
                                                                <span
                                                                    class="badge badge-default pull-right bg-white font-dark bold">3</span>
                                                            </div>
                                                        </a>
                                                        <div class="panel-collapse collapse in"
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
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <div class="mt-list-head list-simple ext-1 font-white bg-green">
                                                <div class="list-head-title-container">
                                                    <h4 class="list-title">DONE</h4>
                                                </div>
                                            </div
                                            <?php foreach ($project->tasks as $task): ?>
                                            <?php if ($task->state->name === 'done'): ?>
                                            <div class="mt-list-container list-simple ext-1 group">
                                                <a class="list-toggle-container" data-toggle="collapse"
                                                   href="#pending-simple<?= $task->id ?>"
                                                   aria-expanded="true">
                                                    <div class="list-toggle uppercase"> <?= $task->name ?>
                                                        <span
                                                            class="badge badge-default pull-right bg-white font-dark bold">3</span>
                                                    </div>
                                                </a>
                                                <div class="panel-collapse collapse in"
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
                                                                    <a href="javascript:;">un lien</a>
                                                                </h3>
                                                                <div class="list-datetime"> <?= $task->start_date ?>
                                                                    au <?= $task->end_date ?></div>

                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div id="visualization-<?= $project->id ?>"></div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>


    <?= $this->Html->css('../assets/vis/vis.css') ?>
    <?= $this->Html->script('../assets/vis/vis.js') ?>



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