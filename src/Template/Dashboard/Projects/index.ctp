


<?= $this->Html->css('sweetalert.css') ?>


<?= $this->Html->css('../assets/vis/vis.css') ?>


<?php
function custom_echo($x, $length)
{
    if (strlen($x) <= $length) {
        echo $x;
    } else {
        $y = substr($x, 0, $length) . '...';
        echo $y;
    }
}

?>

<style>
    .caption {
        cursor: pointer;
    }
</style>



<div class="task-modal-base">
    <div class="task-modal-cont"></div>
</div>


<div class="row">
    <div class="col-md-1 col-sm-1 col-xs-1">
        <ul class="nav nav-tabs-right">
            <li>
                <button title="Ajouter un projet" class="btn btn-info btn-lg" id="project-add"><span
                        class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
            </li>
            <br>
            <br>
            <br>
            <li>
                <button title="Liste des projets" class="btn blue btn-lg active" href="#tab_1" data-toggle="tab" id="btn_1"><span
                        class="glyphicon glyphicon-list" aria-hidden="true"></span>
                </button>
            </li>
            <li>
                <button title="Timeline des projets" class="btn blue btn-lg" href="#tab_2" data-toggle="tab" id="btn_2"><span
                        class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                </button>
            </li>
        </ul>
    </div>
    <div class="col-md-11 col-sm-11 col-xs-11">
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <?php
                $rows = 0;
                foreach ($projects as $project): ?>
                    <?php $rows++ ?>
                    <?php if ($rows % 3 == 0) : ?>
                        <div class="row">
                    <?php endif; ?>

                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="portlet box  blue-chambray">
                            <div class="portlet-title">
                                <div class="caption" id="project-<?= $project->id?>">
                                        <span
                                            class="glyphicon glyphicon-file fa-md"></span> <?= custom_echo($project->name, 20) ?>
                                </div>
                                <div class="actions">
                                    <div class="btn-group">
                                        <?= $this->Html->link('<i class="glyphicon glyphicon-eye-open"></i>', ['action' => 'gestion', $project->id], ['class' => 'btn btn-default btn-sm', 'escape' => false]) ?>
                                    </div>
                                    <div class="btn-group">
                                        <?= $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>', ['action' => 'edit', $project->id], ['id' => 'project-' . $project->id, 'class' => 'edit-project btn btn-default btn-sm', 'escape' => false]) ?>
                                    </div>
                                    <div class="btn-group">
                                        <a id="project-<?= $project->id ?>"
                                           class="btn btn-default btn-sm delete-project"><i
                                                class="glyphicon glyphicon-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="panel-body">
                                    <?= $project->description ?>
                                </div>
                            </div>
                            <div class="portlet-footer" style="color: white">
                                <i class="glyphicon glyphicon-user"></i> <?= count($project->users) ?>
                                sur <?= $project->users_number ?>
                                <br>
                                <i class="glyphicon glyphicon-calendar"></i> Du <?= $project->start_date ?>
                                Au <?= $project->end_date ?>
                            </div>
                        </div>
                    </div>
                    <?php if ($rows % 3 == 0) : ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="tab-pane" id="tab_2">
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
            </div>
        </div>
    </div>
</div>

<?= $this->Html->script('sweetalert.min.js') ?>


<?= $this->Html->script('../assets/vis/vis.js') ?>

<script type="text/javascript">
    // DOM element where the Timeline will be attached
    var container = document.getElementById('visualization');

    // Create a DataSet (allows two way data-binding)
    var items = new vis.DataSet([
        <?php foreach ($projects as $project): ?>
        {
            id: <?= $project->id ?>,
            content: '<?= h($project->name)?>',
            start: '<?= $project->start_date?>',
            end: '<?= $project->end_date?>'
        },
        <?php endforeach; ?>
    ]);

    // Configuration for the Timeline
    var options = {};

    // Create a Timeline
    var timeline = new vis.Timeline(container, items, options);



    //portlet titles links
    $('.caption').on('click', function () {
        var id = $(this).attr('id').split('-');
        window.location = '<?= $this->Url->build(['controller' => 'Projects', 'action' => 'gestion']) ?>' + '/' + id[1];
    });


    //active links
    var buttonsNav = $('#btn_1,#btn_2');

    buttonsNav.on('click', function () {
        buttonsNav.removeClass('active');
        $(this).addClass('active');
    });


    //project add modal
    $('#project-add').on('click', function (event) {
        event.preventDefault();

        var url = '<?= $this->Url->build(['controller' => 'Projects', 'action' => 'add']); ?>';

        $('.task-modal-cont').load(url, function (result) {
            $('#taskModal').modal({show: true});
        });
    });

    //project edit modal
    $('.edit-project').on('click', function (event) {
        event.preventDefault();
        var projectId = $(this).attr('id').split('-');

        var url = '<?= $this->Url->build(['controller' => 'Projects', 'action' => 'edit']); ?>' + '/' + projectId[1];

        $('.task-modal-cont').load(url, function (result) {
            $('#taskModal').modal({show: true});
        });
    });

    $('.delete-project').on('click', function (item) {
        var thisItem = $(this).closest('.portlet');

        swal({
                title: "Supprimer ce projet ?",
                text: "Toutes les informations liées seront supprimées",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                cancelButtonText: "Annuler",
                confirmButtonText: "Oui, supprimer.",
                closeOnConfirm: false
            },
            function () {

                var projectId = item.currentTarget.id.split('-');

                var url = '<?= $this->Url->build(["controller" => "Projects", "action" => "delete"]); ?>' + '/' + projectId[1];

                $.ajax({
                    type: 'post',
                    url: url,
                    success: function () {
                        thisItem.hide();
                        swal("Projet supprimé", "Le projet a été supprimé avec succès", "success");
                    }
                });
            });
    });


</script>



