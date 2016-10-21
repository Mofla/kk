<?= $this->Html->script('../assets/global/plugins/bootstrap/js/bootstrap.min.js') ?>

<div class="col-md-12 col-sm-12 col-xs-12">


    <div class="portlet-body">

        <div class="mt-element-list">
            <div class="col-md-4 col-sm-4 col-xs-4 colum">
                <div class="mt-list-head list-simple ext-1 font-white bg-blue">
                    <div class="list-head-title-container">
                        <h4 class="list-title">
                            TODO
                        </h4>
                    </div>
                </div>
                <div id="colum-1" class="colum">
                    <?php foreach ($project->tasks as $task): ?>
                        <?php if ($task->state->name === 'todo'): ?>
                            <div class="portlet box blue-chambray" id="task-<?= $task->id ?>" style="margin: 1px">
                                <div class="portlet-title">
                                    <div class="caption"><?= $task->name ?></div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <?= $this->Html->link('<i class="glyphicon glyphicon-eye-open"></i>', ['controller' => 'Tasks', 'action' => 'viewajax', $task->id], ['id' => 'task-' . $task->id, 'class'=> 'btn btn-default btn-sm view-task', 'escape' => false]) ?>
                                        </div>
                                        <div class="btn-group">
                                            <a class="btn btn-default btn-sm" href="javascript:;" data-toggle="dropdown">
                                                <i class="icon-wrench"></i>
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <?= $this->Html->link('<i class="fa fa-pencil"></i> Edit ', ['controller' => 'Tasks', 'action' => 'edit', $task->id], ['id' => 'task-' . $task->id, 'class' => 'edittask', 'escape' => false]) ?>
                                                </li>
                                                <li>
                                                    <?= $this->Form->postLink('<i class="glyphicon glyphicon-trash"></i> Delete', ['controller' => 'Tasks', 'action' => 'delete', $task->id], ['escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $task->id)]) ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        <?php endif; ?>
                    <?php endforeach; ?>
                    <div class="portlet portlet-sortable-empty"></div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="mt-list-head list-simple ext-1 font-white bg-yellow-soft">
                    <div class="list-head-title-container">
                        <h4 class="list-title">DOING</h4>
                    </div>
                </div>

                <div id="colum-2" class="colum">
                    <?php foreach ($project->tasks as $task): ?>
                        <?php if ($task->state->name === 'doing'): ?>
                            <div class="portlet box blue-chambray" id="task-<?= $task->id ?>" style="margin: 1px">
                                <div class="portlet-title">
                                    <div class="caption"><?= $task->name ?></div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <?= $this->Html->link('<i class="glyphicon glyphicon-eye-open"></i>', ['controller' => 'Tasks', 'action' => 'viewajax', $task->id], ['id' => 'task-' . $task->id, 'class'=> 'btn btn-default btn-sm view-task', 'escape' => false]) ?>
                                        </div>
                                        <div class="btn-group">
                                            <a class="btn btn-default btn-sm" href="javascript:;" data-toggle="dropdown">
                                                <i class="icon-wrench"></i>
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <?= $this->Html->link('<i class="fa fa-pencil"></i> Edit ', ['controller' => 'Tasks', 'action' => 'edit', $task->id], ['id' => 'task-' . $task->id, 'class' => 'edittask', 'escape' => false]) ?>
                                                </li>
                                                <li>
                                                    <?= $this->Form->postLink('<i class="glyphicon glyphicon-trash"></i> Delete', ['controller' => 'Tasks', 'action' => 'delete', $task->id], ['escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $task->id)]) ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <div class="portlet portlet-sortable-empty"></div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="mt-list-head list-simple ext-1 font-white bg-green-jungle">
                    <div class="list-head-title-container">
                        <h4 class="list-title">DONE</h4>
                    </div>
                </div>
                <div id="colum-3" class="colum">
                    <?php foreach ($project->tasks as $task): ?>
                        <?php if ($task->state->name === 'done'): ?>
                            <div class="portlet box blue-chambray" id="task-<?= $task->id ?>" style="margin: 1px">
                                <div class="portlet-title">
                                    <div class="caption"><?= $task->name ?></div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <?= $this->Html->link('<i class="glyphicon glyphicon-eye-open"></i>', ['controller' => 'Tasks', 'action' => 'viewajax', $task->id], ['id' => 'task-' . $task->id, 'class'=> 'btn btn-default btn-sm view-task', 'escape' => false]) ?>
                                        </div>
                                        <div class="btn-group">
                                            <a class="btn btn-default btn-sm" href="javascript:;" data-toggle="dropdown">
                                                <i class="icon-wrench"></i>
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <?= $this->Html->link('<i class="fa fa-pencil"></i> Edit ', ['controller' => 'Tasks', 'action' => 'edit', $task->id], ['id' => 'task-' . $task->id, 'class' => 'edittask', 'escape' => false]) ?>
                                                </li>
                                                <li>
                                                    <?= $this->Form->postLink('<i class="glyphicon glyphicon-trash"></i> Delete', ['controller' => 'Tasks', 'action' => 'delete', $task->id], ['escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $task->id)]) ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
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
        handle: ".portlet-title",
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



</script>
