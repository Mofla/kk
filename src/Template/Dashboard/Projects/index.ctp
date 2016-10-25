<?= $this->Html->script('../js/jquery.js') ?>

<?= $this->Html->css('../assets/global/plugins/jquery-ui/jquery-ui.min.css') ?>
<?= $this->Html->script('../assets/global/plugins/jquery-ui/jquery-ui.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap/js/bootstrap.min.js') ?>

<?= $this->Html->css('sweetalert.css') ?>
<?= $this->Html->script('sweetalert.min.js') ?>

<?= $this->Html->css('../assets/vis/vis.css') ?>



<div class="task-modal-base" xmlns="http://www.w3.org/1999/html">
    <div class="task-modal-cont"></div>
</div>


<div class="row">
    <div class="col-md-1 col-sm-1 col-xs-1">
        <ul class="nav nav-tabs-right">
            <li>
                <button class="btn btn-info btn-lg" id="project-add"><span
                        class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
            </li>
            <br>
            <br>
            <br>
            <li>
                <button class="btn btn-default btn-lg" href="#tab_1" data-toggle="tab" id="btn_1"><span
                        class="glyphicon glyphicon-list" aria-hidden="true"></span>
                </button>
            </li>
            <li>
                <button class="btn btn-default btn-lg" href="#tab_2" data-toggle="tab" id="btn_2"><span
                        class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                </button>
            </li>
        </ul>
    </div>
    <div class="col-md-11 col-sm-11 col-xs-11">
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
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
                                            <?= $this->Html->link('<i class="glyphicon glyphicon-pencil"></i>', ['action' => 'edit', $project->id], ['id' => 'task-' . $project->id, 'class' => 'edittask btn btn-default btn-sm', 'escape' => false]) ?>
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
                                        <div class="row">
                                            <?= $project->description ?>
                                        </div>
                                        <div class="row">

                                        </div>
                                    </div>

                                </div>
                                <div class="portlet-footer" style="color: white">
                                    Participants : <?= count($project->users) ?> sur <?= $project->users_number ?>
                                    <br>
                                    Du <?= $project->start_date ?> Au <?= $project->end_date ?>
                                </div>
                            </div>
                        </div>


                    <?php endforeach; ?>
                </div>
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



<?= $this->Html->script('../assets/global/plugins/jquery-ui/jquery-ui.min.js') ?>
<?= $this->Html->script('../assets/global/plugins/bootstrap/js/bootstrap.min.js') ?>

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

    //sweet confirm for delete
    function prettyConfirm(title, text, callback) {

    }


    $('.delete-project').on('click', function (item) {
        var thisItem = $(this).closest('.portlet');

        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
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
                        swal("Deleted!", "Your imaginary file has been deleted.", "success");

                    }
                });

            });


    });


</script>



