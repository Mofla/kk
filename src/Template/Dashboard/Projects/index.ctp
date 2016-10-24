<?= $this->Html->script('../js/jquery.js') ?>

<?= $this->Html->css('../assets/global/plugins/jquery-ui/jquery-ui.min.css') ?>
<?= $this->Html->script('../assets/global/plugins/jquery-ui/jquery-ui.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap/js/bootstrap.min.js') ?>


<div class="task-modal-base">
    <div class="task-modal-cont"></div>
</div>


<div class="container-fluid">
    <button class="btn btn-default" id="project-add">Ajouter un projet</button>
    <br>
    <div class="row">
        <?php foreach ($projects as $project): ?>
        <div class="col-md-4 col-sm-4 col-xs-4">
            <div class="portlet box  blue-chambray">
                <div class="portlet-title">
                    <div class="caption">
                        Projet : <?= $project->name ?>
                    </div>
                    <div class="actions">
                        <div class="btn-group">
                            <?= $this->Html->link('<i class="glyphicon glyphicon-eye-open"></i>', ['action' => 'gestion', $project->id], ['class' => 'btn btn-default btn-sm', 'escape' => false]) ?>

                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default btn-sm" href="javascript:;"
                               data-toggle="dropdown">
                                <i class="icon-wrench"></i>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <?= $this->Html->link('<i class="fa fa-pen"></i> Editer ', ['action' => 'edit', $project->id], ['id' => 'task-' . $project->id, 'class' => 'edittask', 'escape' => false]) ?>
                                </li>
                                <li>
                                    <?= $this->Form->postLink('<i class="glyphicon glyphicon-trash"></i>', ['action' => 'delete', $project->id], ['escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="panel-body">
                        <div class="row">
                            <?= $project->description ?>
                        </div>
                        <div class="row">

                        </div>
                    </div>

                </div>
                <div class="portlet-footer" style="color: white">
                    Participants : <?= count($project->users) ?> sur <?= $project->users_number?>
                    <br>
                    Du <?= $project->start_date ?> Au <?= $project->end_date ?>
                </div>
            </div>
        </div>


<?php endforeach; ?>
    </div>
</div>

<div class="row">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3>Timeline des projets</h3>
        </div>
        <div class="panel-body">
            <div id="visualization"></div>
        </div>
    </div>


</div>


<?= $this->Html->script('../assets/global/plugins/jquery-ui/jquery-ui.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap/js/bootstrap.min.js') ?>

<?= $this->Html->css('../assets/vis/vis.css') ?>
<?= $this->Html->script('../assets/vis/vis.js') ?>

<script type="text/javascript">
    // DOM element where the Timeline will be attached
    var container = document.getElementById('visualization');

    // Create a DataSet (allows two way data-binding)
    var items = new vis.DataSet([
        <?php foreach ($projects as $project): ?>
        {
            id: <?= $project->id ?>,
            content: '<?= $project->name?>',
            start: '<?= $project->start_date?>',
            end: '<?= $project->end_date?>'
        },
        <?php endforeach; ?>
    ]);

    // Configuration for the Timeline
    var options = {};

    // Create a Timeline
    var timeline = new vis.Timeline(container, items, options);
</script>

<script>


    //project add modal
    $('#project-add').on('click', function (event) {
        event.preventDefault();

        var url = '<?= $this->Url->build(['controller' => 'Projects', 'action' => 'add']); ?>';


        $('.task-modal-cont').load(url, function (result) {
            $('#taskModal').modal({show: true});
        });
    });


</script>



